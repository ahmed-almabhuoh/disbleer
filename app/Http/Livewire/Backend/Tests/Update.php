<?php

namespace App\Http\Livewire\Backend\Tests;

use App\Models\Test;
use Livewire\Component;

class Update extends Component
{
    public $tests = [];
    public $statuses = [];
    public $subject;
    public $description;
    public $degree;
    public $attempts;
    public $pre_tests;
    public $time_in_minutes;
    public $passing_score;
    public $status;
    public $sequential;
    public $test;

    public function mount()
    {
        $this->tests = Test::byStatus('active')->get();
        $arra = Test::STATUS;
        foreach ($arra as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }

        $this->subject = $this->test->subject;
        $this->description = $this->test->description;
        $this->degree = $this->test->degree;
        $this->attempts = $this->test->attempts;
        $this->pre_tests = $this->test->pre_tests;
        $this->time_in_minutes = $this->test->time_in_minutes;
        $this->passing_score = $this->test->passing_score;
        $this->status = $this->test->status;
        $this->sequential = $this->test->sequential;
    }

    public function render()
    {
        return view('livewire.backend.tests.update');
    }

    public function rules()
    {
        return [
            'subject' => 'required|string|min:2|max:50',
            'description' => 'nullable|string',
            'degree' => 'required|numeric|min:1|max:100',
            'attempts' => 'required|integer|min:1|max:10',
            'pre_tests' => 'nullable',
            'passing_score' => 'required|numeric|min:40|max:99',
            'time_in_minutes' => 'required|numeric|min:5|max:300',
            'sequential' => 'required|boolean',
            'status' => 'required|in:' . implode(",", Test::STATUS),
        ];
    }

    public function create()
    {
        $data = $this->validate();

        $this->test->subject = $data['subject'];
        $this->test->description = $data['description'];
        $this->test->degree = $data['degree'];
        $this->test->attempts = $data['attempts'];
        $this->test->passing_score = $data['passing_score'];
        $this->test->pre_tests = json_encode($data['pre_tests']);
        $this->test->time_in_minutes = $data['time_in_minutes'];
        $this->test->sequential = $data['sequential'];
        $this->test->status = $data['status'];
        $isSaved = $this->test->save();

        if ($isSaved) {
            return redirect()->route('tests.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('backend.dashboard');
    }
}
