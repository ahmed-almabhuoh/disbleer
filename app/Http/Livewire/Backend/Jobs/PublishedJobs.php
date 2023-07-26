<?php

namespace App\Http\Livewire\Backend\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class PublishedJobs extends Component
{
    public $searchTerm;
    protected $jobs;

    public function render()
    {
        $this->jobs = Job::byStatus('in-progress')->where('title', 'LIKE', '%' . $this->searchTerm . '%')
            // ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            // ->orWhere('from_date', 'LIKE', '%' . $this->searchTerm . '%')
            // ->orWhere('to_date', 'LIKE', '%' . $this->searchTerm . '%')
            // ->orWhere('started_salary', 'LIKE', '%' . $this->searchTerm . '%')
            // ->orWhere('end_salary', 'LIKE', '%' . $this->searchTerm . '%')
            ->paginate(10);

        return view('livewire.backend.jobs.published-jobs', [
            'jobs' => $this->jobs,
        ]);
    }

    public function publishJob($jobId)
    {
        Job::where('id', Crypt::decrypt($jobId))->update([
            'status' => 'open',
        ]);
        $this->render();
    }
}
