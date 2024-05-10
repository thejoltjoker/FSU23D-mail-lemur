<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('dashboard.newsletters.index'));
    }

    return view('home');
});

Route::get('/sandbox', function () {
    return view('sandbox');
});

// Dashboard
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // Newsletters
    Route::get('/newsletters/user', [NewsletterController::class, 'user'])->name('newsletters.user');
    Route::resource('newsletters', NewsletterController::class);

    Route::resource('newsletters.subscribers', NewsletterSubscriberController::class)->only([
        'index', 'store', 'destroy',
    ])->shallow();

    // Get user subscriptions
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');

    // Store a new subscription
    Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');

    // Remove a subscription
    Route::delete('/subscriptions', [SubscriptionController::class, 'destroy'])->name('subscriptions.destroy');

    // Show user subscribers
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers');

})->middleware('auth');

// Register account
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store a new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Login to existing account
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Log out of existing account
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

// Authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Password reset
Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->middleware('guest');

Route::get('/create-password', function () {
    return view('auth.create-password');
})->middleware('guest');

// 403 Unauthorized
Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
});

// 403 Unauthorized
Route::get('/not-found', function () {
    return view('errors.not-found');
});
