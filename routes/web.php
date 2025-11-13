<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.accueil');
})->name('accueil');

Route::get('/films', function () {
    return view('pages.films');
})->name('films');

Route::get('/series', function () {
    return view('pages.series');
})->name('series');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
