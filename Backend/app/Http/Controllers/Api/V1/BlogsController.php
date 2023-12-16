<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\V1\BlogData;
use App\Models\Blogs;
use App\Http\Requests\V1\StoreBlogsRequest;
use App\Http\Requests\V1\UpdateBlogsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogCollection;
use App\Http\Resources\V1\BlogResource;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new BlogData;
        $filterItems = $filter->transform($request);

        $blog = Blogs::where($filterItems);

        $blog = $blog->with('user');

        return new BlogCollection($blog->paginate()->appends($request->query()));
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
    public function store(StoreBlogsRequest $request)
    {
        return new BlogResource(Blogs::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blogs::find($id);
        return BlogResource::make($blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, $id)
    {
        Blogs::where('Id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blogs)
    {
        //
    }
}
