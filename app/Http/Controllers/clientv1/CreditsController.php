<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditsController extends Controller
{
    //
    public function getCreditsPage()
    {
        return response()->view('frontend.client-v1.credits.charge');
    }
}
