<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\V1\PrjMemData;
use App\Models\ProjectMembers;
use App\Http\Requests\V1\StoreProjectMembersRequest;
use App\Http\Requests\V1\BulkStoreProjectMembersRequest;
use App\Http\Requests\V1\UpdateProjectMembersRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProjectMemberCollection;
use App\Http\Resources\V1\ProjectMemberResource;
use Illuminate\Http\Request;

class ProjectMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PrjMemData();
        $filterItems = $filter->transform($request);

        $ProjectMembers = ProjectMembers::where($filterItems);

        $ProjectMembers = $ProjectMembers->with('project');
        $ProjectMembers = $ProjectMembers->with('member');

        return new ProjectMemberCollection($ProjectMembers->paginate()->appends($request->query()));
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
    public function store(StoreProjectMembersRequest $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bulkStore(BulkStoreProjectMembersRequest $request)
    {
        return ProjectMembers::insert($request->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ProjectMember = ProjectMembers::find($id);
        return ProjectMemberResource::make($ProjectMember);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectMembers $projectMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectMembersRequest $request, $id)
    {
        ProjectMembers::where('Id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectMembers $projectMembers)
    {
        //
    }
}
