<?php

use App\Http\Controllers\Api\AudiCarController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BMWController;
use App\Http\Controllers\Api\FordController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\HondaController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Public APIs
Route::post('/login', [AuthController::class, 'login']); //Login user to the system

// Private APIs; protected by the authorization
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile/show', [ProfileController::class, 'show']); //Get all user information from database
    Route::get('/audicar/all', [AudiCarController::class, 'all']); 
    Route::get('/audicar/show/{id}', [AudiCarController::class, 'show']); 
    Route::delete('/audicar/destroy/{id}', [AudiCarController::class, 'destroy']); 
    Route::post('/audicar/store', [AudiCarController::class, 'store']); 

    Route::get('/ford/all', [FordController::class, 'all']); 
    Route::get('/ford/show/{id}', [FordController::class, 'show']); 
    Route::delete('/ford/destroy/{id}', [FordController::class, 'destroy']); 
    Route::post('/ford/store', [FordController::class, 'store']); 

    Route::get('/bmw/all', [BMWController::class, 'all']); 
    Route::get('/bmw/show/{id}', [BMWController::class, 'show']); 
    Route::delete('/bmw/destroy/{id}', [BMWController::class, 'destroy']); 
    Route::post('/bmw/store', [BMWController::class, 'store']); 

    Route::get('/honda/all', [HondaController::class, 'all']); 
    Route::get('/honda/show/{id}', [HondaController::class, 'show']); 
    Route::delete('/honda/destroy/{id}', [HondaController::class, 'destroy']); 
    Route::post('/honda/store', [HondaController::class, 'store']); 

    Route::get('/history/index', [HistoryController::class, 'index']); 
    Route::post('/history/store', [HistoryController::class, 'store']); 
});
