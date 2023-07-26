<?php

namespace App\Http\Livewire\Frontend\ClientV1;

use App\Models\Job;
use Livewire\Component;

class ShowJobs extends Component
{
    public $searchTerm;
    protected $jobs;
    public $fullTime = false;
    public $partTime = false;
    public  $fromPrice;
    public $toPrice;

    public function mount()
    {
        $this->jobs = Job::byStatus('open')->latest()->paginate(10);
    }

    public function render()
    {
        $this->jobs = Job::byStatus('open')
            ->latest()
            ->byType($this->partTime && $this->fullTime ? 'all' : ($this->partTime ? 'part-time' : ($this->fullTime ? 'full-time' : 'all')))
            ->where(function ($query) {
                $query->where('title', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('started_salary', '=', $this->fromPrice)
                    ->orWhere('end_salary', '=',  $this->toPrice)
                    // ->orWhereBetween('started_salary', [$this->fromPrice, $this->toPrice])
                    // ->orWhereBetween('end_salary', [$this->fromPrice, $this->toPrice])
                    // ->orWhere(function ($subQuery) {
                    //     $subQuery->orWhereBetween('started_salary', [$this->fromPrice, $this->toPrice]);
                    //     $subQuery->orWhereBetween('end_salary', [$this->fromPrice, $this->toPrice]);
                    // })
                    ->orWhereHas('tags', function ($tagQuery) {
                        $tagQuery->where('tag', 'LIKE', '%' . $this->searchTerm . '%');
                    });
            })
            ->paginate(10);

        return view('livewire.frontend.client-v1.show-jobs', [
            'jobs' => $this->jobs,
        ]);
    }

    public function jobDetails($slug)
    {
        return redirect()->route('jobs.details', $slug);
    }
}
