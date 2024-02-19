<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\V1\CourseData;
use App\Models\Courses;
use App\Http\Requests\V1\StoreCoursesRequest;
use App\Http\Requests\V1\UpdateCoursesRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CourseCollection;
use App\Http\Resources\V1\CourseResource;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CourseData();
        $filterItems = $filter->transform($request);

        $course = Courses::where($filterItems);

        return new CourseCollection($course->paginate()->appends($request->query()));
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
    public function store(StoreCoursesRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Course = Courses::find($id);
        return CourseResource::make($Course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursesRequest $request, $id)
    {
        Courses::where('Id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $courses)
    {
        //
    }
}
