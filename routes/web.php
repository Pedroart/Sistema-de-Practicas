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
});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
