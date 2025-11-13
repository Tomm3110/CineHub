<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/home', function () {
    return view('accueil');
})->name('accueil');

Route::get('/films', [FilmController::class, 'index'])->name('films');

Route::get('/series', function () {
    return view('series');
})->name('series');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
