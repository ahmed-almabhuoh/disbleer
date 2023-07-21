<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission;

class AuthorizationController extends Controller
{
    //
    public function getPermissions()
    {
        return response()->view('backend.permissions.index');
    }

    public function getAssignPage($id)
    {
        return response()->view('livewire.backend.permissions.assign', [
            'id' => $id
        ]);
    }
}
