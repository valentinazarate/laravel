<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('marcas', MarcaController::class);
Route::apiResource('productos', ProductoController::class);
