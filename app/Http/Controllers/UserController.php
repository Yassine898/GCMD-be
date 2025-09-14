<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
   
   public function signin(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|string|email|exists:users,email',
        'password' => 'required|string',
    ]);

    $user = User::where('email', $validated['email'])->first();

    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json(['message' => 'Your credentials are incorrect'], 400);
    }
   
    // You can return a token here (e.g., Sanctum/JWT) if using authentication system
    return response()->json(['user' => $user]);
}
}
