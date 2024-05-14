<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $newsletters = $user->newsletters()->with('subscriptions')->get();

        return view('dashboard.subscribers', [
            'newsletters' => $newsletters,
        ]);
    }
}
