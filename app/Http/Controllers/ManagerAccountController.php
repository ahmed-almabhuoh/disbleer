<?php

namespace App\Http\Controllers;

use App\Models\Disable;
use App\Models\DisableMetaData;
use App\Models\DisableSocialMedia;
use App\Models\Manager;
use App\Models\ManagerMetaData;
use App\Models\ManagerSocialMedia;
use App\Models\Supervisor;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Lwwcas\LaravelCountries\Models\Country;
use Symfony\Component\HttpFoundation\Response;

class ManagerAccountController extends Controller
{
    //
    public function getAccountPage()
    {
        if (auth('manager')->check()) {
            return response()->view('backend.account.account', [
                'country_name' => Country::find(auth()->user()->metadata->country_id)->official_name,
            ]);
        } else if (auth('disable')->check()) {
            return response()->view('frontend.client-v1.account', [
                'country_name' => Country::find(auth()->user()->metadata->country_id)->official_name,
            ]);
        }
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
            $manager =  auth('manager')->check() ? Manager::findOrFail(auth()->user()->id) : (auth('disable')->check() ? Disable::findOrFail(auth()->user()->id) : Supervisor::findOrFail(auth()->user()->id));

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

    // Update manager account information
    public function updateAccountInformation(Request $request)
    {
        $validator = Validator($request->only([
            'about',
            'phone',
            'address',
            'twitter',
            'facebook',
            'instagram',
            'linkedin',
        ]), [
            'about' => 'nullable|string',
            'phone' => 'nullable|string|min:7|max:15',
            'address' => 'nullable|string',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);
        //

        if (!$validator->fails()) {
            if (auth('manager')->check()) {

                ManagerMetaData::where('manager_id', '=', auth()->user()->id)->update([
                    'about' => $request->post('about'),
                    'phone' => $request->post('phone'),
                    'address' => $request->post('address')
                ]);

                ManagerSocialMedia::where('manager_id', '=', auth()->user()->id)->update([
                    'twitter' => $request->post('twitter'),
                    'facebook' => $request->post('facebook'),
                    'instagram' => $request->post('instagram'),
                    'linkedin' => $request->post('linkedin')
                ]);
            } else if (auth('disable')->check()) {
                DisableMetaData::where('disable_id', '=', auth()->user()->id)->update([
                    'about' => $request->post('about'),
                    'phone' => $request->post('phone'),
                    'address' => $request->post('address')
                ]);

                DisableSocialMedia::where('disable_id', '=', auth()->user()->id)->update([
                    'twitter' => $request->post('twitter'),
                    'facebook' => $request->post('facebook'),
                    'instagram' => $request->post('instagram'),
                    'linkedin' => $request->post('linkedin')
                ]);
            } else if (auth('supervisor')->check()) {
                // SupervisorMetaData::where('supervisor_id', '=', auth()->user()->id)->update([
                //     'about' => $request->post('about'),
                //     'phone' => $request->post('phone'),
                //     'address' => $request->post('address')
                // ]);

                // SupervisorSocialMedia::where('supervisor_id', '=', auth()->user()->id)->update([
                //     'twitter' => $request->post('twitter'),
                //     'facebook' => $request->post('facebook'),
                //     'instagram' => $request->post('instagram'),
                //     'linkedin' => $request->post('linkedin')
                // ]);
            }

            return response()->json([
                'title' => __('Changed'),
                'text' => __('Changes Saved Successfully'),
                'icon' => 'success',
            ],  Response::HTTP_OK);
        } else {
            return response()->json([
                'title' =>  __('Failed'),
                'text' => $validator->getMessageBag()->first(),
                'icon' =>  'error',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
