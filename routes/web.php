<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authorize;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('web.index'); } )->name('index.welcome');
Route::get('bolsa_trabajo', function () { return view('web.bolsa_trabajo'); } )->name('index.bolsa_trabajo');

Route::middleware(['auth', 'verified', 'can:UseDashboard'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('dashboard');
    Route::resource('rutafiles', App\Http\Controllers\RutafileController::class);
    Route::resource('files', App\Http\Controllers\FileController::class);

    Route::resource('personas', App\Http\Controllers\PersonaController::class);
    Route::resource('empresas', App\Http\Controllers\EmpresaController::class);
    Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
    
    Route::resource('comentarios', App\Http\Controllers\ComentarioController::class);


    Route::resource('semestres', App\Http\Controllers\semestreController::class);
    Route::resource('tipoprocesos', App\Http\Controllers\tipoprocesoController::class);
    Route::resource('tipoetapas', App\Http\Controllers\tipoetapaController::class);
    Route::resource('estados', App\Http\Controllers\EstadoController::class);

});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
