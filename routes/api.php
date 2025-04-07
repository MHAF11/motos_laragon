<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MotosController;
use App\Http\Controllers\Api\MarcasController;
use App\Http\Controllers\Api\PaisesController;


// Rutas para la API de Motos
Route::get('motos', [MotosController::class, 'index']); // Listar todas las motos activas
Route::post('motos/store', [MotosController::class, 'store']); // Crear una nueva moto
Route::get('motos/{id}', [MotosController::class, 'show']); // Obtener una moto específica por ID
Route::post('motos/{id}/edit', [MotosController::class, 'edit']); // Actualizar una moto existente por ID
Route::post('motos/{id}', [MotosController::class, 'destroy']); // Desactivar (eliminar) una moto por ID



// Rutas para la API de Marcas


Route::get('marcas', [MarcasController::class, 'index']); // Listar todas las marcas activas
Route::post('marcas/store', [MarcasController::class, 'store']); // Crear una nueva marca
Route::get('marcas/{id}', [MarcasController::class, 'show']); // Obtener una marca específica por ID
Route::post('marcas/{id}/edit', [MarcasController::class, 'edit']); // Actualizar una marca existente por ID
Route::post('marcas/{id}', [MarcasController::class, 'destroy']); // Desactivar (eliminar) una marca por ID

// Rutas para la API de Países


Route::get('paises', [PaisesController::class, 'index']); // Listar todos los países activos
Route::post('paises/store', [PaisesController::class, 'store']); // Crear un nuevo país
Route::get('paises/{id}', [PaisesController::class, 'show']); // Obtener un país específico por ID
Route::post('paises/{id}/edit', [PaisesController::class, 'edit']); // Actualizar un país existente por ID
Route::post('paises/{id}', [PaisesController::class, 'destroy']); // Desactivar (eliminar) un país por ID

