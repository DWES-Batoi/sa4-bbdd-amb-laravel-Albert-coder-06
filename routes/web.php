<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\EquipController;

use App\Http\Controllers\PartitController;
use App\Http\Controllers\JugadoraController;

Route::get('/', function () {
    return redirect()->route('estadis.index');
});

Route::resource('/estadis', EstadiController::class);
Route::resource('/equips', EquipController::class);
Route::resource('/partits', PartitController::class);
Route::resource('/jugadoras', JugadoraController::class);

Route::get('/migrate', function () {
    try {
        Artisan::call('migrate:fresh', ['--seed' => true]);
        return "Migracions executades correctament!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});