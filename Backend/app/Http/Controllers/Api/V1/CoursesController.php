<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\V1\CourseData;
use App\Models\courses;

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

        $course = courses::where($filterItems);

        return new CourseCollection($course->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoursesRequest $request)
    {
        $result = new CourseResource(courses::create($request->all()));
        if ($result) {
            return response()->json([
                'message' => 'success',
            ], 200);
        } else {
            return response()->json([
                'message' => 'fail',
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursesRequest $request, $id)
    {
        courses::where('Id', $id)->update($request->all());
    }
}
