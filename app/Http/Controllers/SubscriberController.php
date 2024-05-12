<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $all_subscribers = [];
        $user = Auth::user();
        $newsletters = $user->newsletters()->with('subscriptions')->get();

        foreach ($newsletters as $newsletter) {
            $subscribers = $newsletter->subscriptions()->get();
            foreach ($subscribers as $subscriber) {
                array_push($all_subscribers, $subscriber);
            }
        }

        return view('dashboard.subscribers', [
            'subscribers' => $all_subscribers,
        ]);
    }
}
