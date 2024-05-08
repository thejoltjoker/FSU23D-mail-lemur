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
            return redirect('/');
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

        return redirect('/');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
