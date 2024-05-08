<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function show(Newsletter $newsletter)
    {
        return view('subscriber.show', [
            'subscribers' => $newsletter->subscribers()->get()
        ]);
    }
}
