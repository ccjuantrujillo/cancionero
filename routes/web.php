<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ColeccionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Web Controller
Route::get('/', [WebController::class, 'cancionero'])->name('cancionero');
//Route::get('/cancionero-detalle/{cancion_id?}', [WebController::class, 'cancionero_detalle'])->name('cancionero_detalle');
//Route::get('/cancionero-detalle-misa/{categoriacancion_id?}/{compania_id?}', [WebController::class, 'cancionero_detalle_misa'])->name('cancionero_detalle_misa');
Route::get('/lecturas', [WebController::class, 'lecturas'])->name('lecturas');
Route::get('/misas', [WebController::class, 'misas'])->name('misas');
Route::get('/misa-detalle/{misa_id?}', [Webcontroller::class, 'misa_detalle'])->name('misa_detalle');
Route::post('/buscar-cancion', [WebController::class, 'search_cancion'])->name('buscar_cancion');
//Route::post('/cambiar-cancion/{cancion_id?}', [WebController::class, 'cambiar_cancion'])->name('cambiar_cancion');
//Route::post('/cambiar-cancion-misa/{categoriacancion_id?}', [WebController::class, 'cambiar_cancion_misa'])->name('cambiar_cancion_misa');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/web/inicio', [HomeController::class, 'inicio'])->name('web.inicio');
    Route::get('/web/quienes', [HomeController::class, 'quienes'])->name('web.quienes');
    Route::get('/web/nosotros', [HomeController::class, 'nosotros'])->name('web.nosotros');

    Route::get('/coleccions', [ColeccionController::class, 'index'])->name('coleccions.index');
    Route::get('/coleccions/create', [ColeccionController::class, 'create'])->name('coleccions.create');
    Route::post('/coleccions', [ColeccionController::class, 'store'])->name('coleccions.store');
    Route::get('/coleccions/{producto}', [ColeccionController::class, 'show'])->name('coleccions.show');
    Route::get('/coleccions/{producto}/edit', [ColeccionController::class, 'edit'])->name('coleccions.edit');
    Route::put('/coleccions/{producto}', [ColeccionController::class, 'update'])->name('coleccions.update');
    Route::delete('/coleccions/{producto}', [ColeccionController::class, 'destroy'])->name('procoleccionsductos.destroy');

});

require __DIR__.'/auth.php';
