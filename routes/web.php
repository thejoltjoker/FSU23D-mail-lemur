<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Register account
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store a new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Login to existing account
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Log out of existing account
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// List all newsletters
Route::get('/newsletters', [NewsletterController::class, 'index'])->middleware('auth');

// Form to create a new newsletter
Route::get('/newsletters/create', [NewsletterController::class, 'create'])->middleware('auth');

// Store a new newsletter
Route::post('/newsletters', [NewsletterController::class, 'store'])->middleware('auth');

// Get a single newsletter
Route::get('/newsletters/{newsletter}', [NewsletterController::class, 'show']);

// Get user subscriptions
Route::get('/subscriptions', [SubscriptionController::class, 'index'])->middleware('auth');

// Store a new subscription
Route::post('/subscriptions', [SubscriptionController::class, 'store'])->middleware('auth');

// Show user subscribers
Route::get('/subscribers', [SubscriberController::class, 'index'])->middleware('auth');

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
