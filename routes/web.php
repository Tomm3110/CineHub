<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;

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
