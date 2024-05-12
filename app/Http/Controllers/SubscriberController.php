<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $newsletters = $user->newsletters;

        return view('subscriber.show', [
            'subscribers' => $newsletters->subscriptions()->get(),
        ]);
    }

    public function show(Newsletter $newsletter)
    {
        return view('subscriber.show', [
            'subscribers' => $newsletter->subscriptions()->get(),
        ]);
    }
}
