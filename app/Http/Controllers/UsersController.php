<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;



class UsersController extends Controller
{
    //Register new user
    public function registerUser(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('description'),
            'mobileNumber' => $request->input('price'),
            'password' => $request->input('quantity')
        ]);
        return new UserResource($user);
    }

    //Make user an admin
    public function makeUserAdmin(User $user){
        $user->updated([
            'isAdmin' => 'true'
        ]);
        return new UserResource($user);
    }

    //Edit user details
    public function editUserDetails( UserRequest $request, User $user){
        $user->update([
            'name' => $request->input('name'),
            'mobileNumber' => $request->input('mobileNumber')
        ]);
        return new UserResource($user);
    }

    //delete user
    public function deleteUser(User $user){
        $user->delete();
        return response()->json(null);
    }
}
