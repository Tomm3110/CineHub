<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/films', [FilmController::class, 'index'])->name('films');

Route::get('/series', function () {
    return view('pages.series');
})->name('series');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
