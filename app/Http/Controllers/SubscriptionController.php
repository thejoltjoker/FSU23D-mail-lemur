<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $subscriptions = $user->subscriptions()->get();

        return view('dashboard.subscriptions', ['subscriptions' => $subscriptions]);
    }

    public function store(Request $request)
    {
        // TODO Check if subscription exists
        $user = Auth::user();
        $newsletter = Newsletter::where('id', $request->newsletter_id)->first();

        $existing_subscription = $user->subscriptions()->where('newsletter_id', $newsletter)->first();

        if (! $existing_subscription) {
            $subscription = $user->subscriptions()->attach($newsletter);

            return redirect($request->header('referer'))->with([
                'variant' => 'success',
                'title' => 'Subscription successful',
                'message' => 'Successfully subscribed to '.$newsletter->title,
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $newsletter = Newsletter::where('id', $request->newsletter_id)->first();

        if (Auth::check()) {
            $user = Auth::user();
            $user->subscriptions()->detach($newsletter);

            return redirect($request->header('referer'))->with([
                'variant' => 'success',
                'title' => 'Unsubscribed',
                'message' => 'Successfully unsubscribed to '.$newsletter->title,
            ]);
        }
    }
}
