<?php

namespace App\Http\Livewire\Backend\Tests;

use App\Models\Test;
use Livewire\Component;

class Index extends Component
{
    protected $tests;
    public $searchTerm;

    public function render()
    {
        $this->tests = Test::where('subject', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('degree', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('attempts', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('passing_score', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('time_in_minutes', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.tests.index', [
            'tests' => $this->tests,
        ]);
    }
}
