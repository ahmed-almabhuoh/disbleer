<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProposalsController extends Controller
{
    //
    public function getProposalsPage()
    {
        return response()->view('frontend.client-v1.jobs.proposals');
    }
}
