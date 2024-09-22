<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function signUpPage()
    {
        return view('register');
    }

    public function homePage()
    {
        return view('home');
    }

    public function register(Request $request)
    {
        $newUser = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => 'required|min:5',
        ]);

        $newUser['password'] = Hash::make($newUser['password']);
        $user = User::create($newUser);
        auth()->login($user);

        return redirect('/home')->with('message', 'Logged in successfully');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home')->with('message', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'Invalid Email or Password. Please try again.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Logged out successfully');
    }
}
