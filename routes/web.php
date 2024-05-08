<?php

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\NewsletterController;

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
Route::get('/subscriptions', function () {
    return view('subscriptions');
});

// Show user subscribers
Route::get('/subscribers', function () {
    return view('subscribers');
});

// Password reset
Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->middleware('guest');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.create-password', ['token' => $token]);
})->middleware('guest');
