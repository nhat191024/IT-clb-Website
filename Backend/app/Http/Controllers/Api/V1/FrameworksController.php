<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\frameworks;

use App\Http\Requests\V1\StoreFrameworksRequest;
use App\Http\Requests\V1\UpdateFrameworksRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\FrameworkResource;
use App\Http\Resources\V1\FrameworkCollection;

use App\Data\V1\FrameworkData;

use Illuminate\Http\Request;

class FrameworksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new FrameworkData();
        $filterItems = $filter->transform($request);

        $types = frameworks::where($filterItems);

        return new FrameworkCollection($types->paginate(5)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrameworksRequest $request)
    {
        $result = new FrameworkResource(frameworks::create($request->all()));
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
    public function update(UpdateFrameworksRequest $request, $id)
    {
        $result = frameworks::where('Id', $id)->update($request->all());
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
}
