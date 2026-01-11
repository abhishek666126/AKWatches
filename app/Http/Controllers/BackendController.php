<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Access denied. Admins only.');
        }

        return view('backend.dashboard');
    }

    public function signupshow()
    {
        return view('backend.signup');
    }

    // public function signupstore(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'mobile' => 'required|digits:10|unique:users,mobile',
    //         'password' => 'required|min:6',
    //     ]);

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->mobile = $request->mobile;
    //     $user->password = bcrypt($request->password);
    //     $user->role = 'user';
    //     $user->save();

    //     return redirect()->route('login.show')->with('success', 'Signup successful! Please log in.');
    // }

    public function signupstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|unique:users,mobile',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Signup successful',
                'token' => $token,
                'data' => $user
            ], 201);
        }

        return redirect()
            ->route('login.show')
            ->with('success', 'Signup successful! Please log in.');
    }

    public function loginshow()
    {
        return view('backend.login');
    }


    public function loginstore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials'
                ], 401);
            }
            return back()->withErrors([
                'email' => 'Invalid credentials'
            ])->onlyInput('email');
        }
        $user = Auth::user();
        if ($request->is('api/*')) {
            $user->tokens()->delete();
            // $token = $user->createToken('api-token')->plainTextToken;
            $plainToken = $user->createToken('api-token')->plainTextToken;
            $token = explode('|', $plainToken)[1];
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ]);
        }
        $request->session()->regenerate();
        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Welcome, Admin!');
        }
        return redirect()->route('home')->with('success', 'Welcome back!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.show')->with('success', 'You have been logged out successfully.');
    }
}
