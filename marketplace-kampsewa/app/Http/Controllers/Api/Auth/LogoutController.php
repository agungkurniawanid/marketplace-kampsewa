<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->status = 'offline';
            $user->time_login = null;
            $user->save();

            $user->currentAccessToken()->delete();
        }
        return response()->json(['message' => 'Logged Out'], 200);
    }

}
