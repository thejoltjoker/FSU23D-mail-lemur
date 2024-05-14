<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers');

});

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
// TODO Move into new controller
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])->with([
                    'variant' => 'success',
                    'title' => 'Reset Link Sent',
                    'message' => 'Reset link sent successfully.',
                ])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token, 'email' => request('email')]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:1|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))->with([
                    'variant' => 'success',
                    'title' => 'Password Reset',
                    'message' => 'Your password has been successfully reset.',
                ])

                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// 403 Unauthorized
Route::get('/unauthorized', function () {
    return view('errors.unauthorized');
});

// 403 Unauthorized
Route::get('/not-found', function () {
    return view('errors.not-found');
});
