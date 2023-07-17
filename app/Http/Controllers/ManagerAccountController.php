<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ManagerAccountController extends Controller
{
    //
    public function getAccountPage()
    {
        return response()->view('backend.account.account');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator($request->only([
            'current_password',
            'new_password',
            'new_password_confirmation',
        ]), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        //

        if (!$validator->fails()) {
            $manager = Manager::findOrFail(auth()->user()->id);

            if (Hash::check($request->post('current_password'), $manager->password)) {
                $manager->password = Hash::make($request->post('new_password'));
                $isSaved = $manager->save();

                return response()->json([
                    'title' => $isSaved ? __('Changed') : __('Failed'),
                    'text' => $isSaved ? __('Password Changed Successfully') : __('Failed To Change Your Password !!'),
                    'icon' => $isSaved ? 'success' : 'error',
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'title' =>  __('Failed'),
                    'text' => __('Wrong Credentials'),
                    'icon' =>  'error',
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'title' =>  __('Failed'),
                'text' => $validator->getMessageBag()->first(),
                'icon' =>  'error',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
