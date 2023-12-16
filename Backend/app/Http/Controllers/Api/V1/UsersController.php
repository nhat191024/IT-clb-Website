<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;

use App\Http\Requests\V1\StoreUsersRequest;
use App\Http\Requests\V1\UpdateUsersRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;

use App\Data\V1\MembersData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MembersData();
        $filterItems = $filter->transform($request);

        $members = User::where($filterItems);

        $members = $members->with('major');
        $members = $members->with('course');


        return new UserCollection($members->paginate(5)->appends($request->query()));
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
    public function store(StoreUsersRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return
            response([
                'Message' => 'success',
                'user' => UserResource::make($user),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $Users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        User::where('Id', $id)->update($request->all());
    }



    public function login(Request $request)
    {
        $user_data = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];
        if (!Auth::attempt($user_data)) {
            return
                response()->json([
                    'Message' => 'Login failed.'
                ], 401);
        } else {

            $userData = User::where('username', $user_data['username'])->select('Role', 'id')->first();

            $userId = $userData->id;
            $userRole = $userData->Role;

            /** @var \App\Models\User $user **/  $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return  response([
                'Message' => 'Login successful',
                'Token' => $token,
                'Id' => $userId,
                'Role' => $userRole
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response([
            'Message' => 'Logout'
        ], 201);
    }

    public function delete($id)
    {

        $result = User::where('Id', $id)->delete();
        return $result;
    }
}
