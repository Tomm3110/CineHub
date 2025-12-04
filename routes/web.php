<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::get('/', function () {
    if (Auth::check()) {
        return view('accueil');
    }
    return view('welcome');
})->name('accueil');

Route::get('/home', function () {
    return view('accueil');
})->name('accueil');

Route::resource('film', FilmController::class);

Route::get('/series', function () {
    return view('series');
})->name('series');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware(['guest'])
    ->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest'])
    ->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware(['guest'])
    ->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware(['guest'])
    ->name('password.store');
