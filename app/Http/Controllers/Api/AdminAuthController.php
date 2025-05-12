<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Delete existing tokens
        $admin->tokens()->delete();
        
        // Create new token with 24-hour expiration
        $token = $admin->createToken(
            'admin-token', 
            ['admin'], 
            now()->addHours(24)
        )->plainTextToken;

        return response()->json([
            'admin' => $admin,
            'token' => $token,
            'expires_at' => now()->addHours(24)->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user('admin')->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}