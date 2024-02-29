<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.register');
    }

    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Creating a token for the admin during registration
        // $token = $admin->createToken('registration-token')->plainTextToken;
        return redirect()->route('login#page');
    }

    public function login(Request $request)
    {
        $validator = $this->validation($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cre = $this->getData($request);

        // $admin = Admin::where('email', $request->email)->first();

        // if (!$admin || !Hash::check($request->password, $admin->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }

        $attemptAuth = auth()->guard('admin-web')->attempt($cre);

        if ($attemptAuth) {
            return redirect()->route('dashboard')->with('success', 'Welcome ' . auth()->guard('admin-web')->user()->name);
        } else {
            return redirect()->back();
        }
    }



    // logout
    public function logout()
    {
        auth()->guard('admin-web')->logout();
        return redirect()->route('login#page');
    }



    private function validation($request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email required.',
            'email.email' => 'Please fill your gmail',
            'password' => 'Password.required.',
        ]);
    }

    private function getData($request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
        ];
    }
}