<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;


/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
|
*/

// 1. Ruta principal (/) que ahora apunta al listado de productos
Route::get('/', [ProductoController::class, 'index'])->name('inicio');

// 2. Ruta de recursos para el CRUD (la que ya tenías)
Route::resource('productos', ProductoController::class);
// ... otras rutas

Route::resource('productos', ProductoController::class);


