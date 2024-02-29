<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class UserAuthController extends Controller
{
    //

    public function getUser(Request $request)
    {
        // Check if the user is authenticated
        if ($request->user()) {
            // If authenticated, return a JSON response indicating success
            return response()->json(['isLoggedIn' => true], 200);
        } else {
            // If not authenticated, return a JSON response indicating failure
            return response()->json(['isLoggedIn' => false], 401);
        }
    }



    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $email = User::where('email', $request->email)->first();
        if ($email) {
            return response()->json('Email already exists');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Creating a token for the user during registration
        $token = $user->createToken('registration-token')->plainTextToken;

        return response()->json(['message' => 'User registered successfully', 'user' => $user, 'token' => $token]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful
            $token = $user->createToken('token-name', ['role:user'])->plainTextToken;


            $csrfToken = csrf_token();

            $expirationTimeInMinutes = Carbon::now()->addMonths(3)->diffInMinutes();

            $cookie = Cookie::make('token', $token, $expirationTimeInMinutes, null, null, false, true);


            return response()->json([
                'status' => 200,
                'user' => $user,
                'token' => $token,
                'message' => 'Login Success.'
            ])->withCookie($cookie);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized.'
            ], 401);


            // return response()->json(['message' => 'Login Success.', 200]);
        }
    }


    public function logout(Request $request)
    {
        // $user = $request->user();
        // return response()->json($user);
        // Check if the user is authenticated

        // if ($request->user()) {
        //     $request->user()->tokens()->delete();
        // }

        // $cookie = Cookie::forget('token');
        // Revoke the current user's token
        if (Auth::check()) {
            // If authenticated, revoke all user tokens
            Auth::user()->tokens()->delete();
        }


        return response()->json(['message' => 'Logout successful'])->withCookie(Cookie::forget('token'));
    }
}
