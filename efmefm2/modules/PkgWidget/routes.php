<?php

use Illuminate\Support\Facades\Route;
use Modules\PkgWidget\Controllers\WidgetController;

Route::group(['namespace' => 'Modules\PkgWidget\Controllers'], function () {
    Route::get('/pkgwidget/test', [WidgetController::class, 'test'])->name('pkgwidget.test');
    Route::post('/pkgwidget/execute', [WidgetController::class, 'execute'])->name('pkgwidget.execute');
    Route::get('/pkgwidget/dashboard', [WidgetController::class, 'dashboard']);
});
