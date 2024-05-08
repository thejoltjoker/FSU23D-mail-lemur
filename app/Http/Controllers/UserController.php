<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $form_fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($form_fields)) {
            $request->session()->regenerate();
            return redirect('/')->with([
                'variant' => 'success',
                'title' => 'Logged in',
                'message' => 'You have been successfully logged in'
            ]);
            // ->with('title', 'Logged in')->with('message', 'You have been successfully logged in');
        }

        return back()->withErrors(['email' => 'Uppgifterna stämmer inte'])->onlyInput('email');
    }

    public function create()
    {
        return view('users.register');
    }

    // Create new user
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required'],
            'role' => ['required']
        ]);

        $form_fields['password'] = Hash::make($form_fields['password']);

        $user = User::create($form_fields);

        auth()->login($user);

        return redirect('/')->with([
            'variant' => 'success',
            'title' => 'Account created',
            'message' => 'Account was successfully created'
        ]);;
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with([
            'variant' => 'primary',
            'title' => 'Logged out',
            'message' => 'You have been successfully logged out'
        ]);
    }
}
