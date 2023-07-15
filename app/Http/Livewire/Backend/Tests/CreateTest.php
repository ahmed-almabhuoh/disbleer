<?php

namespace App\Http\Livewire\Backend\Tests;

use App\Models\Test;
use Livewire\Component;

class CreateTest extends Component
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

    public function mount()
    {
        $this->tests = Test::byStatus('active')->get();
        $arra = Test::STATUS;
        foreach ($arra as $value) {
            # code...
            $this->statuses[$value] = ucfirst($value);
        }
        $this->sequential = true;
    }

    public function render()
    {
        return view('livewire.backend.tests.create-test');
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

        $test = new Test();
        $test->subject = $data['subject'];
        $test->description = $data['description'];
        $test->degree = $data['degree'];
        $test->attempts = $data['attempts'];
        $test->passing_score = $data['passing_score'];
        $test->pre_tests = json_encode($data['pre_tests']);
        $test->time_in_minutes = $data['time_in_minutes'];
        $test->sequential = $data['sequential'];
        $test->status = $data['status'];
        $isSaved = $test->save();

        if ($isSaved) {
            return redirect()->route('tests.index');
        }
    }

    public function cancel()
    {
        return redirect()->route('backend.dashboard');
    }
}
