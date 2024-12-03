<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// General Routes
Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login'])->name('login');
Route::get('/verify-email/{id}', [authController::class, 'verifyEmail']);
Route::post('/send-reset-password', [authController::class, 'sendResetPassword']);
Route::post('/reset-password', [authController::class, 'resetPassword'])->name('reset-password');

Route::post('/send-verify-email', [authController::class, 'sendVerifyEmail']);
// Routes that require authentication (Sanctum Token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [authController::class, 'profile']);
    Route::post('/logout', [authController::class, 'logout']);
});

// Pages
Route::get('/verify-success', function () {
    return view('emails.verifySuccess');
})->name('verifySuccess');

Route::get('/reset-success', function () {
    return view('emails.resetSuccess');
})->name('resetSuccess');

Route::get('/reset-password-form', function (Request $request) {
    $token = $request->query('token');
    return view('emails.resetPasswordForm', ['token' => $token]);
})->name('reset-password-form');
