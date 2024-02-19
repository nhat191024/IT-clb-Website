<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\V1\PrjData;
use App\Models\projects;
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

        // $test = projects::latest()->first();

        // return new ProjectResource($test);
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
    public function store(StoreProjectsRequest $request)
    {
        // Projects::create([
        //     "Id" => $request->Id,
        //     "Name" => $row['Name'],
        //     "Image" => $row['Image'],
        //     "Leader" => $row['Leader'],
        //     "StartDate" => $row['StartDate'],
        //     "EndDate" => $row['EndDate'],
        //     "Status" => $row['Status'],
        // ]);
        return new ProjectResource(Projects::create($request->all()));
        // return $request;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectsRequest $request, $id)
    {
        Projects::where('Id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $result = Projects::where('Id', $id)->delete();
        return $result;
    }
}
