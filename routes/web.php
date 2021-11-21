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

// RUTAS AQParkingSite
Route::view('main', 'AQParkingSite.main')->name('indexusr');
Route::view('login', 'AQParkingSite.login')->name('login');
Route::view('principal', 'AQParkingSite.principal')->name('principal');
Route::view('registro', 'AQParkingSite.registro')->name('registro');
Route::view('registro-usr', 'AQParkingSite.registro-usuario')->name('registro-usr');
Route::view('registro-parking', 'AQParkingSite.registro-estacionamiento')->name('registro-parking');
Route::view('cuenta-usr', 'AQParkingSite.cuenta-usuario')->name('cuenta-usr');
Route::view('cuenta-parking', 'AQParkingSite.cuenta-estacionamiento')->name('cuenta-parking');
Route::view('parking-description', 'AQParkingSite.estacionamiento-descripcion')->name('parking-description');
Route::view('parking-booking', 'AQParkingSite.estacionamiento-reserva')->name('parking-booking');  
Route::view('cookies', 'AQParkingSite.politica-cookies')->name('cookies');
Route::view('privacidad', 'AQParkingSite.politica-privacidad')->name('privacidad');
Route::view('terminos', 'AQParkingSite.terminos-condiciones')->name('terminos');
Route::view('recuperacion', 'AQParkingSite.recuperacion-cuenta')->name('recuperacion');