<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsuario;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ControllerUsuario::class, 'inicio']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('redireccionar', [ControllerUsuario::class, 'redireccionar']);

    Route::get('logeado', [ControllerUsuario::class, 'logeado']);

    Route::get('/ver_horario', [ControllerUsuario::class, 'ver_horario']);
    Route::post('/crear_horario', [ControllerUsuario::class, 'crear_horario']);
    // Ruta para mostrar el formulario de edición (método GET)
    Route::get('/editar/{id}', [ControllerUsuario::class, 'editar'])->name('editar');
    // Ruta para actualizar el horario (método POST)
    Route::post('/editar_horario/{id}', [ControllerUsuario::class, 'editar_horario']);
    Route::get('/borrar_horario/{id}', [ControllerUsuario::class, 'borrar_horario']);

    Route::get('/ver_empleado', [ControllerUsuario::class, 'ver_empleado']);
    Route::post('/crear_empleado', [ControllerUsuario::class, 'crear_empleado']);
    Route::get('/editar_empl/{id}', [ControllerUsuario::class, 'editar_empl'])->name('editar_empl');
    // Ruta para actualizar el horario (método POST)
    Route::post('/editar_empleado/{id}', [ControllerUsuario::class, 'editar_empleado']);
    Route::get('/borrar_empleado/{id}', [ControllerUsuario::class, 'borrar_empleado']);

});




