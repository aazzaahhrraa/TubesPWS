<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('home');
});

Route::get('/cari', [SearchController::class, 'search'])->name('search');
Route::get('/about', function () {
    return view('about');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/map', function () {
    return view('map');
})->name('map');

