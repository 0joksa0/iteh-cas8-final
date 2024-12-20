<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\PasswordChars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => ['required', 'string', 'min:8', new PasswordChars],

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create(
            [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function logIn(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            # code...
            return response()->json(['message' => 'Unauhorized'], 401);
        }
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
    public function logout(Request $request) {
        Auth::user()->tokens()->delete();

        return response()->json('Logged out successfully');

    }
}
