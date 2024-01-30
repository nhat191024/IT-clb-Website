<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\types;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TypeResource;
use App\Http\Resources\V1\TypeCollection;

use App\Data\V1\TypeData;

use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index(Request $request)
    {
        $filter = new TypeData();
        $filterItems = $filter->transform($request);

        $types = types::where($filterItems);

        return new TypeCollection($types->paginate()->appends($request->query()));
    }
}
