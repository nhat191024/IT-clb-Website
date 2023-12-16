<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\V1\PrjTaskData;
use App\Models\Tasks;
use App\Http\Requests\V1\StoreTasksRequest;
use App\Http\Requests\V1\UpdateTasksRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TaskCollection;
use App\Http\Resources\V1\TaskResource;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PrjTaskData();
        $filterItems = $filter->transform($request);

        $task = Tasks::where($filterItems);

        $task = $task->with('project');
        $task = $task->with('user');

        return response([
            'Message' => 'success',
            'Task' => new TaskCollection($task->paginate()->appends($request->query()))
        ]);
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
    public function store(StoreTasksRequest $request)
    {
        return new TaskResource(Tasks::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Tasks::find($id);
        return TaskResource::make($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, $id)
    {
        Tasks::where('Id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }

    public function quantity(Request $request)
    {
        $filter = new PrjTaskData();
        $filterItems = $filter->transform($request);

        $task = Tasks::where($filterItems)->count();

        return $task;
    }
}
