<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('posts');
        } else {
            return back()->withErrors([
                'message' => 'Email or password is incorrect!',
            ]);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_user(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:255',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('login');
    }
}
