<?php

namespace App\Http\Livewire\Backend\Jobs;

use App\Models\Proposal;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class JobProposals extends Component
{
    public $jobId;
    protected $proposals;

    public function render()
    {
        $this->proposals = Proposal::where('job_id', '=', Crypt::decrypt($this->jobId))->paginate(10);

        return view('livewire.backend.jobs.job-proposals', [
            'proposals' => $this->proposals,
        ]);
    }
}
