<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Condominium\CondoController;
use App\Http\Controllers\Packages\PackageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Visits\VisitController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('jwt.auth')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::post('/users', [UserController::class, 'store']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    });

    Route::middleware('role:doorman')->group(function () {
        Route::post('/visits', [VisitController::class, 'store']);
        Route::get('/visits', [VisitController::class, 'index']);
        Route::put('/visits/{id}', [VisitController::class, 'update']);
        Route::post('/packages', [PackageController::class, 'store']);
        Route::get('/packages', [PackageController::class, 'index']);
        Route::put('/packages/{id}', [PackageController::class, 'update']);
    });

    Route::middleware('role:resident')->group(function () {
        Route::get('/my-visits', [VisitController::class, 'myVisits']);
        Route::get('/my-packages', [PackageController::class, 'myPackages']);
        Route::post('/authorize-visit/{id}', [VisitController::class, 'authorizeVisit']);
        Route::post('/create-visit', [VisitController::class, 'createVisit']);
        Route::post('/create-voucher', [VisitController::class, 'createVoucher']);
    });

    Route::get('/condo-info', [CondoController::class, 'show']);
});

