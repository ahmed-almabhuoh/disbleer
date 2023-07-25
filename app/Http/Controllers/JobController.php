<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('backend.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('backend.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $job = Job::where('id', Crypt::decrypt($id))->first();
        //
        return response()->view('backend.jobs.update', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job = Job::where('id', Crypt::decrypt($id))->first();
        //
        if ($job->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => __('Deleted'),
                'text' => __('Job deleted successfully!'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => __('Failed'),
                'text' => __('Failed to delete the job, please try again later!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    // Get Job Proposals
    public function getProposals($id)
    {
        return response()->view('backend.jobs.proposals', [
            'id' => $id,
        ]);
    }
}
