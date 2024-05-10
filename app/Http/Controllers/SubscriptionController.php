<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $subscriptions = $user->subscriptions()->get();

        return view('dashboard.subscriptions', ['subscriptions' => $subscriptions]);
    }

    public function store(Request $request)
    {
        $newsletter = Newsletter::where('id', $request->newsletter_id)->first();

        if (Auth::check()) {
            $user = Auth::user();
            $subscription = $user->subscriptions()->attach($newsletter);

            return redirect('/newsletters')->with([
                'variant' => 'success',
                'title' => 'Subscription successful',
                'message' => 'Successfully subscribed to {{$newsletter->name}}',
            ]);
        }
    }
}
