<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // get all users
    public function getAllUsers()
    {
        $users = User::where('level', 'Customer')->get();
        return response()->json([
            'users' => $users,
            'message' => 'Success'
        ], 200);
    }
    // get detail users by id
    public function getUserById($id_user)
    {
        $user = User::find($id_user);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user], 200);
    }
}
