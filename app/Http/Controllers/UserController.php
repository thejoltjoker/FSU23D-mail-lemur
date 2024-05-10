<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'password' => ['required'],
        ]);

        if (auth()->attempt($form_fields)) {
            $request->session()->regenerate();

            return redirect(route('dashboard.newsletters.index'))->with([
                'variant' => 'success',
                'title' => 'Logged in',
                'message' => 'You have been successfully logged in',
            ]);
            // ->with('title', 'Logged in')->with('message', 'You have been successfully logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function create()
    {
        return view('users.register', ['roles' => Role::all()]);
    }

    // Create new user
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required'],
        ]);

        $form_fields['password'] = Hash::make($form_fields['password']);
        // $form_fields['role_id'] = Role::where('name', 'subscriber')->first();

        $user = User::create($form_fields);

        foreach ($request->all() as $key => $value) {
            if (Str::startsWith($key, 'role-')) {
                $roleName = Str::replaceFirst('role-', '', $key);
                $role = Role::where('name', $roleName)->first();
                if ($role) {
                    $user->roles()->attach($role);
                }
            }
        }

        auth()->login($user);

        return redirect('/')->with([
            'variant' => 'success',
            'title' => 'Account created',
            'message' => 'Account was successfully created',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with([
            'variant' => 'primary',
            'title' => 'Logged out',
            'message' => 'You have been successfully logged out',
        ]);
    }
}
