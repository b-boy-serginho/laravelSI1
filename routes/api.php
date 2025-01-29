<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/mostrar/usuario/todo', [ApiController::class, 'api_usuario'])->name('api_usuario');
Route::get('/mostrar/usuario/id={user_id}', [ApiController::class, 'api_usuario_id'])->name('api_usuario_id');
Route::post('/mostrar/usuario2', [ApiController::class, 'mostrar_usuario2'])->name('mostrar_usuario');
Route::post('/crear/usuario', [ApiController::class, 'crear_usuario'])->name('crear_usuario');
//---------------------------------------------------------------------------------------------
//PARA EL TOKEN
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/sanctum/token', [AuthController::class, 'generateToken']);

//Eliminar el token
Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'tokens eliminados';
});

