<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthenticationController extends Controller
{
    //
    public function getLoginPage($guard)
    {
        return response()->view('backend.auth.login', [
            'guard' => $guard,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|boolean',
            'guard' => 'required|string',
        ]);
        //
        $credentials = [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ];
        $guard  = !$request->post('as_supervisor') ? Crypt::decrypt($request->post('guard')) : 'supervisor';
        if (Auth::guard($guard)->attempt($credentials, $request->post('remember'))) {
            return redirect()->route('backend.dashboard');
        } else {
            return redirect()->route('login', $request->post('guard'))->withErrors([
                __('Wrong Credentials!'),
            ]);
        }
    }

    public function logout()
    {
        $guard = 'manager';
        if (auth('supervisor')->check()) {
            $guard = 'supervisor';
        } else if (auth('disable')->check()) {
            Auth::logout();
            return redirect()->route('clientv1.login');
        }

        Auth::logout();
        return redirect()->route('login', Crypt::encrypt($guard));
    }
}
