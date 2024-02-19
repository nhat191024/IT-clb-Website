<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\types;

use App\Http\Requests\V1\StoreTypesRequest;
use App\Http\Requests\V1\UpdateTypesRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TypeResource;
use App\Http\Resources\V1\TypeCollection;

use App\Data\V1\TypeData;

use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TypeData();
        $filterItems = $filter->transform($request);

        $types = types::where($filterItems);

        return new TypeCollection($types->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypesRequest $request)
    {
        $result = new TypeResource(types::create($request->all()));
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
    public function update(UpdateTypesRequest $request, $id)
    {
        $result = types::where('Id', $id)->update($request->all());
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
