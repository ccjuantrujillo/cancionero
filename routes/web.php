<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Admin\MisaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Cliente\WebController;
use App\Http\Controllers\Admin\CancionController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\LecturaController;

Auth::routes();

// Web Controller
Route::get('/lecturas', [WebController::class, 'lecturas'])->name('lecturas');
Route::get('/', [WebController::class, 'cancionero'])->name('cancionero');
Route::get('/cancionero-detalle/{cancion_id?}', [WebController::class, 'cancionero_detalle'])->name('cancionero_detalle');
Route::get('/cancionero-detalle-misa/{categoriacancion_id?}/{compania_id?}', [WebController::class, 'cancionero_detalle_misa'])->name('cancionero_detalle_misa');
Route::get('/misas', [WebController::class, 'misas'])->name('misas');
Route::get('/misa-detalle/{misa_id?}', [Webcontroller::class, 'misa_detalle'])->name('misa_detalle');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/cambiar-cancion/{cancion_id?}', [WebController::class, 'cambiar_cancion'])->name('cambiar_cancion');
Route::post('/cambiar-cancion-misa/{categoriacancion_id?}', [WebController::class, 'cambiar_cancion_misa'])->name('cambiar_cancion_misa');

// Cancion Admin
Route::prefix('cancion')->name('cancion.')->group(function () {
    Route::get('/listar-canciones', [CancionController::class, 'index'])->name('index');
    Route::post('/list', [CancionController::class, 'list'])->name('list');
    Route::get('/crear-cancion', [CancionController::class, 'create'])->name('create');
    Route::get('/editar-cancion/{cancion_id?}/edit', [CancionController::class, 'edit'])->name('edit');
    Route::get('/editar-cancion/{cancion_id?}', [CancionController::class, 'show'])->name('show');
    Route::post('/guardar-cancion', [CancionController::class, 'store'])->name('store');
    Route::patch('/actualizar-cancion/{cancion_id?}', [CancionController::class, 'update'])->name('update');
    Route::post('/buscar-cancion/{cancion_id?}', [CancionController::class, 'search'])->name('search');
    Route::delete('/eliminar-cancion/{cancion_id?}', [CancionController::class, 'destroy'])->name('destroy');
});

// Categoriacancion Admin
Route::prefix('categoriacancion')->name('categoriacancion.')->group(function () {
    Route::get('/listar/{codigo}', [CancionController::class, 'seleccionar_cancionero'])->name('seleccionar_cancionero');
    Route::get('/eliminar-categoriacancion/{categoriacancion_id}', [CancionController::class, 'eliminar_categoriacancion'])->name('eliminar_categoriacancion');
});

// Categoria Admin
Route::prefix('categoria')->name('categoria.')->group(function () {
    Route::get('/listar-categoria', [CategoriaController::class, 'index'])->name('index');
    Route::get('/crear-categoria', [CategoriaController::class, 'create'])->name('create');
    Route::get('/editar-categoria/{categoria_id?}/edit', [CategoriaController::class, 'edit'])->name('edit');
    Route::get('/editar-categoria/{categoria_id?}', [CategoriaController::class, 'show'])->name('show');
    Route::post('/guardar-categoria', [CategoriaController::class, 'store'])->name('store');
    Route::patch('/actualizar-categoria/{categoria_id?}', [CategoriaController::class, 'update'])->name('update');
    Route::post('/buscar-categoria/{categoria_id?}', [CategoriaController::class, 'search'])->name('search');
    Route::delete('/eliminar-categoria/{categoria_id?}', [CategoriaController::class, 'destroy'])->name('destroy');
});

// Misa Admin
Route::prefix('misa')->name('misa.')->group(function () {
    Route::get('/listar-misas', [MisaController::class, 'index'])->name('index');
    Route::get('/crear-misa', [MisaController::class, 'create'])->name('create');
    Route::get('/editar-misa/{misa_id?}', [MisaController::class, 'edit'])->name('edit');
    Route::post('/guardar-misa', [MisaController::class, 'store'])->name('store');
    Route::patch('/actualizar-misa/{misa_id}', [MisaController::class, 'update'])->name('update');
    Route::post('/buscar-misas', [MisaController::class, 'search'])->name('search');
    Route::delete('/eliminar-misa/{misa_id}', [MisaController::class, 'destroy'])->name('destroy');
});

// Lectura Admin
Route::prefix('lectura')->name('lectura.')->group(function () {
    Route::get('/listar-lecturas', [LecturaController::class, 'index'])->name('index');
    Route::get('/crear-lectura', [LecturaController::class, 'create'])->name('create');
    Route::get('/editar-lectura/{lectura_id?}', [LecturaController::class, 'edit'])->name('edit');
    Route::post('/guardar-lectura', [LecturaController::class, 'store'])->name('store');
    Route::post('/actualizar-lectura/{misa_id?}', [LecturaController::class, 'update'])->name('update');
    Route::post('/buscar-lectura', [LecturaController::class, 'search'])->name('search');
    Route::post('/eliminar-lectura', [LecturaController::class, 'delete'])->name('delete');
});

// -------- Usuario -----------------//
Route::resource('/usuario','Admin\UsuarioController');
Route::post('/seleccionar-compania', [UsuarioController::class, 'seleccionarCompania'])->name('selecciona_compania.user');

// -- Correos --- //
Route::get('/envio',[EmailController::class, 'MensajeCumpleanos']);

Route::get('/compania/listar',function(){
    return getCompanias();
});