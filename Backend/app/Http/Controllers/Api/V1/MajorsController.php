<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Majors;
use App\Http\Requests\V1\StoreMajorsRequest;
use App\Http\Requests\V1\UpdateMajorsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MajorCollection;
use App\Http\Resources\V1\MajorResource;
use App\Data\V1\MajorsData;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MajorsData();
        $filterItems = $filter->transform($request);

        $Major = Majors::where($filterItems);

        return new MajorCollection($Major->paginate()->appends($request->query()));
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
        return new MajorResource(Majors::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $major = Majors::find($id);
        return MajorResource::make($major);
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
    public function update(UpdateMajorsRequest $request, $id)
    {
        Majors::where('Id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Majors $majors)
    {
        //
    }
}
