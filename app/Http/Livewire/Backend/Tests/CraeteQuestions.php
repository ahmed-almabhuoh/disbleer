<?php

namespace App\Http\Livewire\Backend\Tests;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithFileUploads;

class CraeteQuestions extends Component
{
    use WithFileUploads;

    public $test;
    public $question;
    public $answer;
    public $is_active;
    public $files;
    protected $questions;
    public $searchTerm;
    public $editQuestionId = null;
    public $updatedQuestion;

    protected $listeners = ['questionCreated'];

    public function mount()
    {
        $this->is_active = true;
    }

    public function render()
    {
        return view('livewire.backend.tests.craete-questions', [
            'questions' => $this->questionCreated(),
        ]);
    }

    public function rules()
    {
        return [
            'question' => 'required|string|min:2',
            'answer' => 'required|string|min:2',
            'is_active' => 'required|boolean',
            'files' => 'nullable',
        ];
    }

    public function create()
    {
        $data = $this->validate();
        $isSaved = false;

        if (is_null($this->editQuestionId)) {
            $question = new Question();
            $question->question = $data['question'];
            $question->answer = $data['answer'];
            $question->is_active = $data['is_active'];
            $question->test_id = $this->test->id;

            $files = [];
            if ($data['files']) {
                foreach ($data['files'] as $file) {
                    $filePath = $file->store('cms/questions', 'public');
                    $files[] = $filePath;
                }
                $question->files = json_encode($files);
            }
            $isSaved = $question->save();
        } else {
            $this->updatedQuestion->question = $data['question'];
            $this->updatedQuestion->answer = $data['answer'];
            $this->updatedQuestion->is_active = $data['is_active'];
            $this->updatedQuestion->test_id = $this->test->id;

            $files = [];
            if ($data['files']) {
                foreach ($data['files'] as $file) {
                    $filePath = $file->store('cms/questions', 'public');
                    $files[] = $filePath;
                }
                $this->updatedQuestion->files = json_encode($files);
            }
            $isSaved = $this->updatedQuestion->save();
        }

        if ($isSaved) {
            $this->emit('questionCreated');
            $this->editQuestionId = null;
        }
    }

    // Listeners
    public function questionCreated()
    {
        return  $this->test->questions()
            ->where('question', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('answer', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('is_active', 'LIKE', '%' . $this->searchTerm . '%')
            ->latest()->get();
    }

    // Delete question
    public function deleteQuestion($questionId)
    {
        $this->test->questions()->where('id', Crypt::decrypt($questionId))->delete();
    }

    // Update question
    public function updateQuestion($questionId)
    {
        $this->editQuestionId = Crypt::decrypt($questionId);
        $this->updatedQuestion = $this->test->questions()->findOrFail($this->editQuestionId);
        $this->question = $this->updatedQuestion->question;
        $this->answer = $this->updatedQuestion->answer;
        $this->is_active = $this->updatedQuestion->is_active;
    }
}
