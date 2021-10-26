<?php

use App\Http\Controllers\AdministracionSistema\InicioController;
use App\Http\Controllers\AdministracionSistema\TipoDocumentoController;
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

Route::get('/',[InicioController::class,'index'])->name('inicio');

Route::resource('TipoDocumento',TipoDocumentoController::class);
Route::resource('Usuario',\App\Http\Controllers\AdministracionSistema\UsuarioController::class);
