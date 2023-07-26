<?php

namespace App\Http\Controllers;

use App\Models\Disable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\Response;

class DisableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('backend.disables.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('backend.disables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Disable $disable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $disable = Disable::where('id', Crypt::decrypt($id))->first();
        //
        return response()->view('backend.disables.update', [
            'disable' => $disable,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disable $disable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $disable = Disable::where('id', Crypt::decrypt($id))->first();
        //
        if ($disable->delete()) {
            return response()->json([
                'icon' => 'success',
                'title' => __('Deleted'),
                'text' => __('Disable deleted successfully!'),
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'icon' => 'error',
                'title' => __('Failed'),
                'text' => __('Failed to delete the disable, please try again later!'),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
