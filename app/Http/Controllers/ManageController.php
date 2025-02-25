<?php

namespace App\Http\Controllers;

use App\Models\manage;
use App\Http\Requests\StoremanageRequest;
use App\Http\Requests\UpdatemanageRequest;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('manage.manage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremanageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemanageRequest $request, manage $manage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manage $manage)
    {
        //
    }
}
