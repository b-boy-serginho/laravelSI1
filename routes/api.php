<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/api_usuario', [ApiController::class, 'api_usuario'])->name('api_usuario');
Route::post('/crear_usuario', [ApiController::class, 'crear_usuario']);

