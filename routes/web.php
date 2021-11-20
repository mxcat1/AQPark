<?php

use App\Http\Controllers\AdministracionSistema\AutenticateAdminController;
use App\Http\Controllers\AdministracionSistema\InicioController;
use App\Http\Controllers\AdministracionSistema\TipoDocumentoController;
use App\Http\Controllers\AdministracionSistema\UsuarioController;
use App\Http\Controllers\AdministracionSistema\VehiculoController;
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

Route::get('/',[InicioController::class,'index'])->name('inicio')->middleware('authrol');

Route::resource('TipoDocumento',TipoDocumentoController::class)->middleware('authrol');
Route::resource('Usuario',UsuarioController::class)->middleware('authrol');
Route::resource('Vehiculo',VehiculoController::class)->middleware('authrol');

Route::get('Usuario/CambiarPassword/{Usuario}',[UsuarioController::class,'cambiarpasswordvista'])->name('CambiarContraseña')->middleware('authrol');
Route::put('Usuario/CambiarPassword/{Usuario}',[UsuarioController::class,'cambiarpassword'])->name('CambiarContraseñaUsuario')->middleware('authrol');

Route::get('/login-administrador-sistema',[AutenticateAdminController::class,'login'])->name('LoginAdministrador')->middleware('logincontrol');
Route::post('/iniciarsession',[AutenticateAdminController::class,'autenticate'])->name('LoginAutenticacion')->middleware('logincontrol');;
Route::post('/cerrarsession',[AutenticateAdminController::class,'logout'])->name('LoginDesautenticacion')->middleware('authrol');
