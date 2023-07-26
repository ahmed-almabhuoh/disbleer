<?php

namespace App\Http\Livewire\Backend\Jobs;

use App\Models\Job;
use Livewire\Component;

class Index extends Component
{
    protected $jobs;
    public $searchTerm;

    public function render()
    {
        $this->jobs = Job::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('from_date', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('to_date', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('started_salary', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('end_salary', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.jobs.index', [
            'jobs' => $this->jobs,
        ]);
    }
}
