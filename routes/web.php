<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // ✅ Corregido con mayúscula

// Mostrar formulario de registro
Route::get('/', [UserController::class, 'inicio'])->name('usuario.inicio');

// Crear nuevo usuario
Route::post('/usuarios', [UserController::class, 'store'])->name('usuario.store'); 

// Ver todos los usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('usuario.index');

// Editar usuario
Route::get('/usuarios/{id}/editar', [UserController::class, 'edit'])->name('usuario.edit');

// Actualizar usuario
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuario.update');

// Eliminar usuario
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuario.destroy');
