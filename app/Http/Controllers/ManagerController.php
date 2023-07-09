<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view('backend.managers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return response()->view('backend.managers.create');
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
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $manager = Manager::where('id', Crypt::decrypt($id))->first();
        //
        return response()->view('backend.managers.update', [
            'manager' => $manager,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $manager = Manager::where('id', Crypt::decrypt($id))->first();
        //
    }
}
