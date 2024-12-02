<?php

use App\Http\Controllers\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// General
Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login'])->name('login');
Route::get('/verify-email/{id}', [authController::class, 'verifyEmail']);
// Need Token
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



// Page
Route::get('/verify-success', function () {
    return view('emails.verifySuccess');
})->name('verifySuccess');
