<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('members', MembersController::class);
    Route::apiResource('majors', MajorsController::class);
    Route::apiResource('courses', CoursesController::class);
    Route::apiResource('projects', ProjectsController::class);
    Route::apiResource('projectMembers', ProjectMembersController::class);
    Route::apiResource('tasks', TasksController::class);

});
