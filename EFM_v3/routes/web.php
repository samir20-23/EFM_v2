<?php

use App\Http\Controllers\LivreController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::resource('/livres', LivreController::class);
Route::resource('/dashboard', DashboardController::class);