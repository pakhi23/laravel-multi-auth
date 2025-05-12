<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AgentAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $agent = Agent::where('email', $request->email)->first();

        if (!$agent || !Hash::check($request->password, $agent->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Delete existing tokens
        $agent->tokens()->delete();
        
        // Create new token with 12-hour expiration
        $token = $agent->createToken(
            'agent-token', 
            ['agent'], 
            now()->addHours(12)
        )->plainTextToken;

        return response()->json([
            'agent' => $agent,
            'token' => $token,
            'expires_at' => now()->addHours(12)->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user('agent')->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}