<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsuario;
use App\Http\Controllers\ProductoController;

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

    Route::get('/ver_rol', [ControllerUsuario::class, 'ver_rol']);
    Route::post('/crear_rol', [ControllerUsuario::class, 'crear_rol']);
    Route::get('/editar_rol/{id}', [ControllerUsuario::class, 'editar_rol']);
    Route::post('/editarRol/{id}', [ControllerUsuario::class, 'editarRol']);
    Route::get('/borrar_rol/{id}', [ControllerUsuario::class, 'borrar_rol']);

    Route::get('/ver_horario', [ControllerUsuario::class, 'ver_horario']);
    Route::post('/crear_horario', [ControllerUsuario::class, 'crear_horario']);
    Route::get('/editar/{id}', [ControllerUsuario::class, 'editar'])->name('editar');
    Route::post('/editar_horario/{id}', [ControllerUsuario::class, 'editar_horario']);
    Route::get('/borrar_horario/{id}', [ControllerUsuario::class, 'borrar_horario']);

    Route::get('/ver_empleado', [ControllerUsuario::class, 'ver_empleado']);
    Route::post('/crear_empleado', [ControllerUsuario::class, 'crear_empleado']);
    Route::get('/editar_empl/{id}', [ControllerUsuario::class, 'editar_empl']);
    Route::post('/editar_empleado/{id}', [ControllerUsuario::class, 'editar_empleado']);
    Route::get('/borrar_empleado/{id}', [ControllerUsuario::class, 'borrar_empleado']);

    Route::get('/ver_proveedor', [ProductoController::class, 'ver_proveedor']);
    Route::post('/crear_proveedor', [ProductoController::class, 'crear_proveedor']);
    Route::get('/editar_proveedor/{id}', [ProductoController::class, 'editar_proveedor']);
    Route::post('/editarProveedor/{id}', [ProductoController::class, 'editarProveedor']);
    Route::get('/borrar_proveedor/{id}', [ProductoController::class, 'borrar_proveedor']);

    Route::get('/ver_factura', [ProductoController::class, 'ver_factura']);
    Route::post('/crear_factura', [ProductoController::class, 'crear_factura']);
    Route::get('/borrar_factura/{id}', [ProductoController::class, 'borrar_factura']);
    Route::get('/editar_factura/{id}', [ProductoController::class, 'editar_factura']);
    Route::post('/editarFactura/{id}', [ProductoController::class, 'editarFactura']);

    Route::get('/ver_categoria', [ProductoController::class, 'ver_categoria']);
    Route::post('/crear_categoria', [ProductoController::class, 'crear_categoria']);
    Route::get('/borrar_categoria/{id}', [ProductoController::class, 'borrar_categoria']);
    Route::get('/editar_categoria/{id}', [ProductoController::class, 'editar_categoria']);
    Route::post('/editarCategoria/{id}', [ProductoController::class, 'editarCategoria']);

    Route::get('/ver_producto', [ProductoController::class, 'ver_producto']);
    Route::post('/crear_producto', [ProductoController::class, 'crear_producto']);
    Route::get('/borrar_producto/{id}', [ProductoController::class, 'borrar_producto']);
    Route::get('/editar_producto/{id}', [ProductoController::class, 'editar_producto']);
    Route::post('/editarProducto/{id}', [ProductoController::class, 'editarProducto']);

    Route::get('/ver_detalle', [ProductoController::class, 'ver_detalle']);
    Route::post('/crear_detalle', [ProductoController::class, 'crear_detalle']);
    Route::get('/borrar_detalle/{id}', [ProductoController::class, 'borrar_detalle']);
    Route::get('/editar_detalle/{id}', [ProductoController::class, 'editar_detalle']);
    Route::post('/editarDetalle/{id}', [ProductoController::class, 'editarDetalle']);

});




