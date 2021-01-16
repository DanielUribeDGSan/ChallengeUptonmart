<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Web */

Route::get('/', [App\Http\Controllers\WebController::class, 'inicio'])->name('inicio');
Route::post('/registro', [App\Http\Controllers\WebController::class, 'registroUsuario'])->name('registro');


Auth::routes();

/* Login */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Nóminas */
Route::post('/registro-nomina', [App\Http\Controllers\NominaController::class, 'registroNomina'])->name('registro-nomina');
Route::post('/actualizar-nomina', [App\Http\Controllers\NominaController::class, 'actualizarNomina'])->name('actualizar-nomina');
Route::post('/eliminar-nomina', [App\Http\Controllers\NominaController::class, 'eliminarNomina'])->name('eliminar-nomina');

/* Usuarios */
Route::post('/registro-usuario', [App\Http\Controllers\UsuariosController::class, 'registroUsuario'])->name('registro-usuario');
Route::post('/actualizar-usuario', [App\Http\Controllers\UsuariosController::class, 'actualizarUsuario'])->name('actualizar-usuario');
Route::post('/eliminar-usuario', [App\Http\Controllers\UsuariosController::class, 'eliminarUsuario'])->name('eliminar-usuario');
Route::get('/exportar-pdf', [App\Http\Controllers\UsuariosController::class, 'exportarPdf'])->name('exportar-pdf');