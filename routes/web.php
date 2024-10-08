<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Index');
});


Route::get('/auth', function () {
    return view('Authentication');
})->name('auth');

Route::get('/main', function () {
    return view('Main-content');
})->name('main');

Route::get('/{any}', function () {
    return view('Main-content'); // or your main view file
})->where('any', '.*');
