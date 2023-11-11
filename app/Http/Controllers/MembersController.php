<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Http\Requests\StoreMembersRequest;
use App\Http\Requests\UpdateMembersRequest;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreMembersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembersRequest $request, Members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Members $members)
    {
        //
    }
}
