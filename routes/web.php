<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session; // 👈 AFEGEIX AIXÒ
use App\Http\Controllers\ClassificacioController;



// ✅ Ruta per canviar idioma (i18n) 👈 AFEGEIX AIXÒ
Route::get('/locale/{locale}', function (string $locale) {
    $available = ['ca', 'es', 'en'];

    if (!in_array($locale, $available, true)) {
        $locale = config('app.fallback_locale', 'en');
    }

    Session::put('locale', $locale);

    return redirect()->back();
})->name('setLocale');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test-broadcast', function () {
    $delta = [['equip_id' => 1, 'delta' => 1]];
    event(new \App\Events\PartitActualitzat($delta));
    return 'Event fired!';
});


// ✅ Públicos: SOLO index (para evitar conflicto con /create)
Route::resource('equips', EquipController::class)->only(['index']);
Route::resource('estadis', EstadiController::class)->only(['index']);
Route::resource('partits', App\Http\Controllers\PartitController::class)->only(['index']);
Route::resource('jugadoras', App\Http\Controllers\JugadoraController::class)->only(['index']);


// 🔒 Protegidos: crear/editar/borrar (y store/update/destroy)
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])->name('profile.destroy');

    Route::resource('equips', EquipController::class)->except(['index', 'show']);
    Route::resource('estadis', EstadiController::class)->except(['index', 'show']);
    Route::resource('partits', App\Http\Controllers\PartitController::class)->except(['index', 'show']);
    Route::resource('jugadoras', App\Http\Controllers\JugadoraController::class)->except(['index', 'show']);
});


// ✅ Públicos: show AL FINAL (así /create no lo captura {id})
Route::resource('equips', EquipController::class)->only(['show']);
Route::resource('estadis', EstadiController::class)->only(['show']);
Route::resource('partits', App\Http\Controllers\PartitController::class)->only(['show']);
Route::resource('jugadoras', App\Http\Controllers\JugadoraController::class)->only(['show']);


Route::get('/auth/google/redirect', [AuthController::class , 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class , 'handleGoogleCallback'])->name('google.callback');


Route::middleware(['auth', 'not.convidat'])->group(function () {
    Route::resource('equips', EquipController::class)->except(['index', 'show']);
    Route::resource('jugadoras', JugadoraController::class)->except(['index', 'show']);
    Route::resource('partits', App\Http\Controllers\PartitController::class)->except(['index', 'show']);
    Route::resource('estadis', App\Http\Controllers\EstadiController::class)->except(['index', 'show']);
// ...altres recursos d’escriptura
});


Route::get('/classificacio', [ClassificacioController::class , 'index'])
    ->name('classificacio.index');
require __DIR__ . '/auth.php';
