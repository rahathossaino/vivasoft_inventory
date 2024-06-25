<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(){
        return false;
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function register(Request $request)
    {
       try{
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);
            $user = User::create($validatedData);
            // $token = $user->createToken('LaravelAuthApp')->accessToken;

            return response()->json(['message' => "Registered successfully"], 201);
       }
       catch(ValidationException $e){
            return response()->json([
                'message' => 'Validation failed',
                'errors'=>$e->validator->errors()->all()
                ], 422);
       }
        
    }
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json(['meg' => 'logged out successfully'], 201);
    }
}
