<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function getJobsPage()
    {
        return response()->view('frontend.client-v1.dashboard');
    }
}
