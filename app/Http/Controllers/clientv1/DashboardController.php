<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function getDashboard()
    {
        return response()->view('frontend.client-v1.dashboard');
    }
}
