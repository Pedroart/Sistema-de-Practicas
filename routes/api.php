<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ubigeo/departamentos',[App\Http\Controllers\Api\UbigeoController::class,'departamentos']);
Route::get('ubigeo/{id}',[App\Http\Controllers\Api\UbigeoController::class,'index']);
Route::get('ubigeo/{id_ubidepartamento}/provincias',[App\Http\Controllers\Api\UbigeoController::class,'provincias']);
Route::get('ubigeo/{id_ubidepartamento}/distritos',[App\Http\Controllers\Api\UbigeoController::class,'distrito']);

Route::get('ubiedu/facultades', [App\Http\Controllers\Api\UbieduController::class, 'facultad']);
Route::get('ubiedu/{id}', [App\Http\Controllers\Api\UbieduController::class, 'index']);

Route::get('ubiedu/{id_facultad}/departamentos', [App\Http\Controllers\Api\UbieduController::class, 'departamento']);
Route::get('ubiedu/{id_departamento}/escuelas', [App\Http\Controllers\Api\UbieduController::class, 'escuela']);
