<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsuario;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;


use Illuminate\Support\Facades\Auth;

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

    Route::get('/ver_usuario', [ControllerUsuario::class, 'ver_usuario'])->name('ver_usuario');
    Route::get('/editar_usuario/{id}', [ControllerUsuario::class, 'editar_usuario'])->name('editar_usuario');
    Route::put('/editar_usuario/{id}', [ControllerUsuario::class, 'actualizar_usuario']); // Ruta para actualizar
    
    Route::get('/ver_permiso', [ControllerUsuario::class, 'ver_permiso'])->name('ver_permiso');
    Route::post('/crear_permiso', [ControllerUsuario::class, 'crear_permiso'])->name('crear_permiso');

    Route::get('/ver_usuario_permiso', [ControllerUsuario::class, 'ver_usuario_permiso'])->name('ver_usuario_permiso');
    Route::post('/usuario_excel', [ControllerUsuario::class, 'usuario_excel'])->name('usuario_excel');

    
    Route::post('/crear_usuario', [ControllerUsuario::class, 'crear_usuario'])->name('crear_usuario');
    Route::get('/editar_usuario_rol/{id}', [ControllerUsuario::class, 'editar_usuario_rol'])->name('editar_usuario_rol');
    Route::put('/editar_rol_user/{id}', [ControllerUsuario::class, 'editar_rol_user'])->name('editar_rol_user');



    // Route::post('/editar_nuevo_usuario/{id}', [ControllerUsuario::class, 'editar_nuevo_usuario']);
    // Route::get('/borrar_usuario/{id}', [ControllerUsuario::class, 'borrar_usuario']);
    
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

    Route::get('/bitacora', [ControllerUsuario::class, 'bitacora']);

    Route::get('/detalle_producto/{id}', [VentaController::class, 'detalle_producto']);
    Route::post('/agregar_carrito/{id}', [VentaController::class, 'agregar_carrito']);

    Route::get('/logout', [VentaController::class, 'logout'])->name('logout');

    Route::get('/ver_carrito', [VentaController::class, 'ver_carrito'])->name('ver_carrito');
    Route::get('/eliminar_carrito/{id}', [VentaController::class, 'eliminar_carrito']);

    Route::get('/ver_pedido', [VentaController::class, 'ver_pedido']);

    Route::get('/stripe/{totalAPagar}', [VentaController::class, 'stripe']);
    Route::post('stripe/{totalAPagar}', [VentaController::class, 'stripePost'])
    ->name('stripe.post');

    Route::get('/ver_cliente', [VentaController::class, 'ver_cliente']);

    Route::get('/mostrar_pedido', [VentaController::class, 'mostrar_pedido']);

    Route::get('/entrega/{id}', [VentaController::class, 'entrega']);

    Route::get('/generar-pdf', [VentaController::class, 'generarPDF'])->name('generarPDF');
    Route::get('/imprimir/{id}', [VentaController::class, 'imprimir'])->name('imprimir');

    Route::get('/busqueda', [VentaController::class, 'busqueda'])->name('busqueda');

    Route::post('/agregar_comentario', [ControllerUsuario::class, 'agregar_comentario'])->name('agregar_comentario');
    Route::post('/agregar_respuesta', [ControllerUsuario::class, 'agregar_respuesta'])->name('agregar_respuesta');

    Route::get('/ver_etiqueta', [ProductoController::class, 'ver_etiqueta']);
    Route::post('/crear_etiqueta', [ProductoController::class, 'crear_etiqueta']);
    Route::get('/borrar_etiqueta/{id}', [ProductoController::class, 'borrar_etiqueta']);
    Route::get('/editar_etiqueta/{id}', [ProductoController::class, 'editar_etiqueta']);
    Route::post('/editarEtiqueta/{id}', [ProductoController::class, 'editarEtiqueta']);

    Route::get('/ver_inventario', [ProductoController::class, 'ver_inventario']);
    Route::post('/crear_inventario', [ProductoController::class, 'crear_inventario']);

    Route::get('/cliente', [VentaController::class, 'cliente']);
    Route::post('/crear_cliente', [VentaController::class, 'crear_cliente']);
    Route::get('/facturar/{id}', [VentaController::class, 'facturar']);
    Route::post('/crear_factura_cliente/{id}', [VentaController::class, 'crear_factura_cliente']);
    Route::get('/pdf_factura/{id}', [VentaController::class, 'pdf_factura'])->name('pdf_factura');

    Route::get('/historial', [VentaController::class, 'historial']);

    // Route::get('/factura_cliente', [VentaController::class, 'factura_cliente']);
    // Route::get('/imprimir_factura', [VentaController::class, 'imprimir_factura']);

    Route::get('/reportePDF', [ReporteController::class, 'reportePDF'])->name('reportePDF');

});




