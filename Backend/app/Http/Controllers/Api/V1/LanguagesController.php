<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\languages;

use App\Http\Requests\V1\StoreLanguagesRequest;
use App\Http\Requests\V1\UpdateLanguagesRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LanguageCollection;
use App\Http\Resources\V1\LanguageResource;

use App\Data\V1\LanguageData;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $filter = new LanguageData();
        $filterItems = $filter->transform($request);

        $languages = languages::where($filterItems);

        return new LanguageCollection($languages->paginate(5)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguagesRequest $request)
    {
        $result = new LanguageResource(languages::create($request->all()));
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
    public function update(UpdateLanguagesRequest $request, $id)
    {
        $result = languages::where('Id', $id)->update($request->all());
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
