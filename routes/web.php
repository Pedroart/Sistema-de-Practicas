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

    /*
    Route::get('test', function () {
        // Datos de ejemplo para estudiantes y grupos
        $estudiantes = [
            (object) ['id' => 1, 'nombre' => 'Juan', 'apellido' => 'Pérez', 'grupo_id' => 1],
            (object) ['id' => 2, 'nombre' => 'Ana', 'apellido' => 'García', 'grupo_id' => null],
            (object) ['id' => 3, 'nombre' => 'Luis', 'apellido' => 'Fernández', 'grupo_id' => 2],
            (object) ['id' => 4, 'nombre' => 'Marta', 'apellido' => 'López', 'grupo_id' => null],
        ];

        $grupos = [
            (object) ['id' => 1, 'nombre_profesor' => 'Profesor A'],
            (object) ['id' => 2, 'nombre_profesor' => 'Profesor B'],
        ];

        return view('seccion.asignaciones', compact('estudiantes', 'grupos'));
    })->name('test');
    */
    Route::resource('secciones', App\Http\Controllers\SeccionController::class);
    Route::post('secciones_grupos/{id}', [App\Http\Controllers\SeccionController::class,'grupos'])->name('secciones.grupos');
    Route::resource('rutafiles', App\Http\Controllers\RutafileController::class);
    Route::resource('files', App\Http\Controllers\FileController::class);

    Route::resource('personas', App\Http\Controllers\PersonaController::class);
    Route::resource('empresas', App\Http\Controllers\EmpresaController::class);
    Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);

    Route::resource('comentarios', App\Http\Controllers\ComentarioController::class);

    Route::resource('enlaces', App\Http\Controllers\EnlaceController::class);
    Route::get('enlacesrapidos', [App\Http\Controllers\EnlaceController::class,'indexado'])->name('indexado');

    Route::resource('semestres', App\Http\Controllers\semestreController::class);
    Route::resource('tipoprocesos', App\Http\Controllers\tipoprocesoController::class);
    Route::resource('tipoetapas', App\Http\Controllers\tipoetapaController::class);
    Route::resource('estados', App\Http\Controllers\EstadoController::class);

    Route::resource('userinstitucionals', App\Http\Controllers\UserinstitucionalController::class);
    Route::resource('userinstitucionalslote', App\Http\Controllers\UserinstitucionalloteControlador::class);
    Route::post('patron', [App\Http\Controllers\UserinstitucionalloteControlador::class,'patron'])->name('patron');
    Route::post('supervisores', [App\Http\Controllers\SeccionController::class,'supervisores'])->name('asignar.supervisores');
    Route::resource('perfil', App\Http\Controllers\PerfilController::class);

    Route::resource('matriculas', App\Http\Controllers\MatriculaController::class);

    Route::resource('registros', App\Http\Controllers\RegistroController::class);

    Route::resource('procesos', App\Http\Controllers\procesoController::class);
    Route::get('proceso_estudiante/{id}', [App\Http\Controllers\procesoController::class,'proceso_estudiante'])->name('datos.view');
    Route::get('validacion', [App\Http\Controllers\procesoController::class,'index_validacion'])->name('validacion.index');

    Route::get('validacion/{id}/view', [App\Http\Controllers\procesoController::class,'procesar'])->name('validacion.view');

    Route::get('validacion/{id}/edit', [App\Http\Controllers\procesoController::class,'edit_titular'])->name('procesos.edit_titular');
    Route::post('validacion/{id}/update', [App\Http\Controllers\procesoController::class, 'update_titular'])->name('procesos.save_titular');


    Route::get('procesos/{id}/{etapa}/{metodo}', [App\Http\Controllers\procesoController::class,'ver_metodo'])->name('procesos.conf');
    Route::post('procesos/estado/{id_etapa}',[App\Http\Controllers\procesoController::class,'estado'])->name('eestado');

    Route::get('supervicion', [App\Http\Controllers\procesoController::class,'proceso_supervicion'])->name('procesos.supervicion');

    Route::get('proceso/{nombre}', [App\Http\Controllers\ProcesoEstudianteController::class,'procesar'])->name('proceso.index');
    Route::get('proceso/{nombre}/{etapa}/{metodo}', [App\Http\Controllers\ProcesoEstudianteController::class,'procesar'])->name('proceso.conf');
    Route::post('proceso/create/{tipoproceso}',[App\Http\Controllers\EtapaController::class,'store_modular'])->name('proceso.create');
    Route::post('proceso/delete/{tipoproceso}',[App\Http\Controllers\EtapaController::class,'destroy_modular'])->name('proceso.delete');
    Route::resource('proceso_', App\Http\Controllers\ProcesoEstudianteController::class);


});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

require __DIR__.'/auth.php';
