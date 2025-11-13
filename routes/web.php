<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.accueil');
})->name('accueil');

Route::get('/films', [FilmController::class, 'index'])->name('films');

Route::get('/series', function () {
    return view('pages.series');
})->name('series');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
