<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CustomerCheck;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('dashboard.newsletters.index'));
    }

    return view('home');
});

Route::get('/newsletters', function () {
    return view('newsletters', ['newsletters' => Newsletter::all()]);
});

// Dashboard
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
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
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers')->middleware(CustomerCheck::class);

    // User profile
    Route::singleton('/profile', ProfileController::class);
});

// Register account
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('register');

// Store a new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Login to existing account
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Log out of existing account
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

// Clear all user sessions
Route::post('/clear-sessions', function () {
    DB::table('sessions')->whereUserId(Auth::id())->delete();

    return redirect('/')->with([
        'variant' => 'primary',
        'title' => 'Logged out',
        'message' => 'You have been successfully logged out from all sessions',
    ]);
})->middleware('auth')->name('clear-sessions');

// Authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Password reset
// TODO Move into new controller
Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'send'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'send'])->middleware('guest')->name('password.update');

// 403 Unauthorized
Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
})->name('unauthorized');

// 403 Unauthorized
Route::get('/not-found', function () {
    return view('errors.not-found');
});
