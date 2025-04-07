<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaileController;
use App\Http\Controllers\NatuveController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sailes', SaileController::class);
Route::resource('natuves', NatuveController::class);