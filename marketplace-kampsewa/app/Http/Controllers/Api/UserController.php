<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::where('type', 0)->get();
        return response()->json([
            'users' => $users,
            'message' => 'Success'
        ], 200);
    }

    public function getUserByIDOrName($identifier)
    {
        if (is_numeric($identifier)) {
            $user = User::find($identifier);
        } else {
            $user = User::where('name', $identifier)->first();
        }
        if (!$user || $user->type !== 0) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user], 200);
    }
}
