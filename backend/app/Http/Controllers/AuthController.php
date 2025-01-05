<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            Auth::user()->tokens()->delete();

            return response()->json([
                'message' => 'Login Successful',
                'token' => Auth::user()->createToken('authenticatedToken')->plainTextToken,
            ]);
        }

        return response()->json([
            'message' => 'login Failed'
        ], 400);
    }

    public function logout(Request $request) {

        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout Successful'
        ]);
    }
}
