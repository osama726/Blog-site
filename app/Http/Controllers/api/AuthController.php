<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        // $token = Auth::guard('api')->attempt($credentials);
        $token = auth('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function refresh() {
        $refreshToken = auth('api')->refresh();

        return response()->json([
            'refresh_token' => $refreshToken,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function me() {
        $user = auth('api')->user();
        return response()->json($user);
    }

    public function logout() {
        auth('api')->logout(true);

        return response()->json(['success' => 'Successfully logged out']);
    }


}
