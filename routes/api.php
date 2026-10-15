<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('role:Cliente')->group(function () {
        Route::get('/categorias', [CategoriaController::class, 'index']);
        Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
        Route::get('/marcas', [MarcaController::class, 'index']);
        Route::get('/productos', [ProductoController::class, 'index']);
    });

    Route::middleware('role:Administrador')->group(function () {
        Route::apiResource('categorias', CategoriaController::class);
        Route::apiResource('marcas', MarcaController::class);
        Route::apiResource('productos', ProductoController::class);
    });
    // Route::apiResource('categorias', CategoriaController::class);
    // Route::apiResource('marcas', MarcaController::class);
    // Route::apiResource('productos', ProductoController::class);
});
