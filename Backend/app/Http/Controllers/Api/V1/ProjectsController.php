<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\projects;

use App\Data\V1\PrjData;
use App\Http\Requests\V1\StoreProjectsRequest;
use App\Http\Requests\V1\UpdateProjectsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProjectCollection;
use App\Http\Resources\V1\ProjectResource;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PrjData();
        $filterItems = $filter->transform($request);

        $project = projects::where($filterItems);

        $project = $project->with('projectDetail', 'projectDetail.leader', 'projectDetail.projectMember', 'projectDetail.projectMember.major', 'projectDetail.projectMember.course', 'type', 'language', 'framework');

        return new ProjectCollection($project->paginate(5)->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectsRequest $request)
    {
        $project  = Projects::create([
            "code" => $request->code,
            "name" => $request->name
        ]);
        $project->type()->attach($request->type);
        $project->language()->attach($request->language);
        $project->framework()->attach($request->framework);
        if ($project) {
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
    public function update(UpdateProjectsRequest $request, $id)
    {
        $project  = Projects::find($id);

        $project->update($request->all());

        if ($request->type) {
            $project->type()->detach();
            $project->type()->attach($request->type);
        }
        if ($request->language) {
            $project->language()->detach();
            $project->language()->sync($request->language);
        }
        if ($request->framework) {
            $project->framework()->detach();
            $project->framework()->attach($request->framework);
        }
        if ($project) {
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
