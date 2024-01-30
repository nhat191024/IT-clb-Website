<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\languages;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LanguageCollection;
use App\Http\Resources\V1\LanguageResource;

use App\Data\V1\LanguageData;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index(Request $request){
        $filter = new LanguageData();
        $filterItems = $filter->transform($request);

        $languages = languages::where($filterItems);

        return new LanguageCollection($languages->paginate()->appends($request->query()));
    }
}
