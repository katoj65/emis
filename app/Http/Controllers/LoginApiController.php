<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User_role;


class LoginApiController extends Controller
{

    public function Login(Request $request)
    {

        $validate = Validator::make($request->all(),
            ['email' => 'required', 'password' => 'required']);
        if ($validate->fails()) {
            return response()->json(['status_code' => 400, 'message' => 'Fill all fields']);
        }
        $credentials = Request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'message', 'message' => 'Invalid password or email'
            ]);
        }
        $user = user::where('email', $request->email)->first();
        $role = User_role::where('user_id', $user->id)->get();
        $tokenResult = $user->createToken('authToken')->plainTextToken;
        return response()->json(['status_code' => 200, 'token' => $tokenResult, 'user' => $user, 'user_role' => $role]);
    }


//logout functionality
    public function logout(Request $request)
    {
        if (Auth::user()->tokens()->delete()) {
            return response()->json(['true']);
        } else {
            return response()->json(['false']);
        }

    }


}
