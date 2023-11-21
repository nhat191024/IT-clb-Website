<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Members;
use App\Http\Requests\V1\StoreMembersRequest;
use App\Http\Requests\V1\UpdateMembersRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MemberCollection;
use App\Http\Resources\V1\MemberResource;
use Illuminate\Http\Request;
use App\Data\V1\MembersData;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MembersData();
        $filterItems = $filter->transform($request);

        $members = Members::where($filterItems);

        $members = $members->with('major');
        
        return new MemberCollection($members->paginate()->appends($request->query()));
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
    public function store(StoreMembersRequest $request)
    {
        $member = Members::create($request->validated());

        return MemberResource::make($member);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $member = Members::find($id);
        return MemberResource::make($member);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembersRequest $request, Members $members)
    {
        $members->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Members $members)
    {
        //
    }
}
