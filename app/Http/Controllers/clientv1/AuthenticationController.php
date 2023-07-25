<?php

namespace App\Http\Controllers\clientv1;

use App\Http\Controllers\Controller;
use App\Models\Disable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function getReg()
    {
        return response()->view('frontend.auth.reg');
    }

    public function reg(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|min:3',
            'lname' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:45',
        ]);

        $disable = Disable::create([
            'fname' => $request->post('fname'),
            'lname' => $request->post('lname'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
        ]);

        Auth::guard('disable')->login($disable);

        return redirect()->route('clientv1.login');
    }

    public function terms()
    {
        dd('Terms');
    }
}
