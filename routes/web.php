<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\MotosController;
use \App\Http\Controllers\MarcasController;
use \App\Http\Controllers\PaisesController;

Route::get('/', [HomeController::class, 'index'])->name('index');
// Seccion de motos
Route::get('motos', [MotosController::class, 'index'])->name('motos.index');
Route::get('/motos/crear', [MotosController::class, 'create'])->name('motos.create');
Route::post('/motos', [MotosController::class, 'store'])->name('motos.store');
Route::get('/motos/{id}', [MotosController::class, 'show'])->name('motos.show');
Route::get('/motos/{id}/editar', [MotosController::class, 'edit'])->name('motos.edit');
Route::put('motos/{id}', [MotosController::class, 'update'])->name('motos.update');
Route::delete('/motos/{id}', [MotosController::class, 'destroy'])->name('motos.destroy');





Route::get('/paises/crear', [PaisesController::class, 'create'])->name('paises.create');
// Rutas para la sección de países
Route::get('/paises', [PaisesController::class, 'index'])->name('paises.index'); // Listar todos los países
Route::get('/paises/crear', [PaisesController::class, 'create'])->name('paises.create'); // Formulario para crear un país
Route::post('/paises', [PaisesController::class, 'store'])->name('paises.store'); // Guardar el nuevo país
Route::get('/paises/{id}', [PaisesController::class, 'show'])->name('paises.show'); // Ver detalles de un país
Route::get('/paises/{id}/editar', [PaisesController::class, 'edit'])->name('paises.edit'); // Formulario para editar un país
Route::post('/paises/{id}', [PaisesController::class, 'update'])->name('paises.update'); // Actualizar un país
Route::delete('/paises/{id}/eliminar', [PaisesController::class, 'destroy'])->name('paises.destroy'); // Eliminar un país


//seccion marcas
Route::get('/marcas', [MarcasController::class, 'index'])->name('marcas.index');
Route::get('/marcas/crear', [MarcasController::class, 'create'])->name('marcas.create');
Route::post('/marcas', [MarcasController::class, 'store'])->name('marcas.store');
Route::get('/marcas/{id}', [MarcasController::class, 'show'])->name('marcas.show');
Route::get('/marcas/{id}/editar', [MarcasController::class, 'edit'])->name('marcas.edit');
Route::post('/marcas/{id}', [MarcasController::class, 'update'])->name('marcas.update');
Route::delete('/marcas/{id}/eliminar', [MarcasController::class, 'destroy'])->name('marcas.destroy');




