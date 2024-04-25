<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function registerForm()
    {
        return view('auth.register');
    }

    function loginForm()
    {
        return view('auth.login');
    }
    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }

    function registerPost(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'username' => ['nullable', 'string'],
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $credentials = $request->only('email', 'password');
        // $credentials = ['email' => $user->email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {

            return to_route('notes.index');
        }

        return to_route('registerForm')->with('message', 'Something went wrong! Please try again!');
    }

    function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if (Auth::attempt($credentials)) {

            return to_route('notes.index');
        }
        return to_route('login')->with('message', 'Invalid email or password!');
    }
}
