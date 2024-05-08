<?php

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return view('home');
});

// Register account
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Store a new user
Route::post('/users', [UserController::class, 'store']);

// Login to existing account
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

// Log out of existing account
Route::post('/logout', [UserController::class, 'logout']);

// Authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// List all newsletters
Route::get('/newsletters', [NewsletterController::class, 'index']);

// Form to create a new newsletter
Route::get('/newsletters/create', [NewsletterController::class, 'create']);

// Store a new newsletter
Route::post('/newsletters', [NewsletterController::class, 'store']);

// Get a single newsletter
Route::get('/newsletters/{newsletter}', [NewsletterController::class, 'show']);

// Get user subscriptions
Route::get('/subscriptions', [SubscriptionController::class, 'index']);

// Store a new subscription
Route::post('/subscriptions', [SubscriptionController::class, 'store']);


// Show user subscribers
Route::get('/subscribers', [SubscriberController::class, 'index']);

// Password reset
Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->middleware('guest');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.create-password', ['token' => $token]);
})->middleware('guest');

// 403 Unauthorized
Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
});

// 403 Unauthorized
Route::get('/not-found', function () {
    return view('errors.not-found');
});
