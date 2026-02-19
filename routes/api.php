<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EquipController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::name('api.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);

        // Exemple: protegim els endpoints d'escriptura
        Route::apiResource('jugadores', JugadoraController::class)
            ->parameters(['jugadores' => 'jugadora'])
            ->except(['index', 'show']);

        Route::apiResource('equips', EquipController::class)
            ->parameters(['equips' => 'equip'])
            ->except(['index', 'show']);
    });

    // Endpoints públics (lectura)
    Route::apiResource('jugadores', JugadoraController::class)
        ->parameters(['jugadores' => 'jugadora'])
        ->only(['index', 'show']);

    Route::apiResource('equips', EquipController::class)
        ->parameters(['equips' => 'equip'])
        ->only(['index', 'show']);
});

