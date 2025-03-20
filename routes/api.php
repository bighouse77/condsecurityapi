<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/docs', function () {
    return view('swagger::index');
});

Route::get('/test', [TestController::class, 'test']);
