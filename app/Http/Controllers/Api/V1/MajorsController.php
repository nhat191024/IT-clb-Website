<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Majors;
use App\Http\Requests\StoreMajorsRequest;
use App\Http\Requests\UpdateMajorsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MajorResource;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Majors::all();
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
    public function store(StoreMajorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Majors $majors)
    {
        return MajorResource::make($majors);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Majors $majors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorsRequest $request, Majors $majors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Majors $majors)
    {
        //
    }
}
