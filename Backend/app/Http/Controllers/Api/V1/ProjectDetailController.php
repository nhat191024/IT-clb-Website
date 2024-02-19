<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\projectDetails;

use App\Data\V1\PrjDetailData;
use App\Http\Requests\V1\StoreProjectDetailRequest;
use App\Http\Requests\V1\UpdateProjectDetailRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProjectDetailCollection;
use App\Http\Resources\V1\ProjectDetailResource;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PrjDetailData();
        $filterItems = $filter->transform($request);

        $project = projectDetails::where($filterItems);

        $project = $project->with('leader', 'projectMember');

        return new ProjectDetailCollection($project->paginate(5)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectDetailRequest $request)
    {
        $projectDetail = projectDetails::create([
            'leaderID' => $request->leaderID,
            'projectID' => $request->projectID,
            'description' => $request->description,
            'projectSrc' => $request->projectSrc,
            'status' => $request->status,
            'show' => $request->show,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
        ]);
        $projectDetail->projectMember()->attach($request->projectMember);

        if ($projectDetail) {
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
    public function update(UpdateProjectDetailRequest $request, $id)
    {
        $projectDetail  = projectDetails::find($id);

        $projectDetail->update($request->all());

        if ($request->projectMember) {
            $projectDetail->projectMember()->detach();
            $projectDetail->projectMember()->attach($request->projectMember);
        }

        if ($projectDetail) {
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
