<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function getLogin()
    {
        return response()->view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'rememberMe' => 'nullable|boolean',
        ]);
        //
        $credentials = [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ];

        if (Auth::guard('disable')->attempt($credentials, $request->post('rememberMe'))) {
            return redirect()->route('clientv1.dashboard');
        } else {
            return redirect()->route('clientv1.login')->withErrors([
                __('Wrong Credentials!'),
            ]);
        }
    }
}
