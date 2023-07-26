<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Proposal;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function getJobsPage()
    {
        return response()->view('frontend.client-v1.dashboard');
    }

    public function getJobPage($slug)
    {
        $job = Job::byStatus('open')->where('slug', $slug)->first();
        if (is_null($job))
            return redirect()->route('clientv1.dashboard');
        return response()->view('frontend.client-v1.jobs.job-details', [
            'slug' => $slug,
            'job' => $job,
            'avg' => Proposal::where('job_id', $job->id)->avg('salary'),
            'number' => Proposal::where('job_id', $job->id)->count(),
        ]);
    }
}
