<?php

use App\Http\Controllers\AdministracionSistema\AutenticateAdminController;
use App\Http\Controllers\AdministracionSistema\InicioController;
use App\Http\Controllers\AdministracionSistema\TipoDocumentoController;
use App\Http\Controllers\AdministracionSistema\UsuarioController;
use App\Http\Controllers\AdministracionSistema\VehiculoController;
use App\Http\Controllers\AQParkingSite\AQParkingController;
use App\Http\Controllers\AQParkingSite\AutenticacionUserController;
use App\Http\Controllers\AQParkingSite\EstacionamientoAQParkingController;
use App\Http\Controllers\AQParkingSite\RegistroParkingController;
use App\Http\Controllers\AQParkingSite\ReservaParkingController;
use App\Http\Controllers\AQParkingSite\UsuarioAQParkingController;

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

// RUTAS AQParkingAdmin

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

Route::get('/AQParking',[AQParkingController::class,'index'])->name('indexAQParking');
Route::get('/AQParking/registro',[AQParkingController::class,'registro'])->name('registroAQParking');
Route::get('/AQParking/politica-de-cookies',[AQParkingController::class,'cookies'])->name('cookiesAQParking');
Route::get('/AQParking/politica-de-privacidad',[AQParkingController::class,'privacidad'])->name('privacidadAQParking');
Route::get('/AQParking/terminos-y-condiciones',[AQParkingController::class,'terminos'])->name('terminosAQParking');

    //AUTENTICACION
Route::get('/AQParking/login',[AutenticacionUserController::class,'login'])->name('loginAQParking');
Route::post('/Sesionusuario',[AutenticacionUserController::class,'autenticacion'])->name('autenticacionAQParking');
Route::post('/Cerrarsesion',[AutenticacionUserController::class,'logout'])->name('logout');

    //ESTACIONAMIENTO
Route::get('/AQParkingSite/detalles-estacionamiento',[EstacionamientoAQParkingController::class,'index'])->name('estacionamientoAQParking');
Route::get('/AQParkingSite/cuenta-estacionamiento',[EstacionamientoAQParkingController::class,'show'])->name('cuenta-estacionamientoAQParking');

    //REGISTROPARKING
Route::get('/AQParking/registro/estacionamiento',[RegistroParkingController::class,'index'])->name('registro-estacionamiento');
Route::get('/AQParking/registro/estacionamiento/propietario',[RegistroParkingController::class,'userpark'])->name('registro-estacionamiento-dueño');
Route::post('/AQParking/registro/estacionamiento/propietario',[RegistroParkingController::class,'storeuser'])->name('create-dueño-parking');


    //RESERVAPARKING
Route::get('/AQParkingSite/detalles-estacionamiento/reserva',[ReservaParkingController::class,'index'])->name('reserva-estacionamiento');

    //USUARIO
Route::get('/AQParkingSite',[UsuarioAQParkingController::class,'index'])->name('main-pageAQParking');
Route::get('/AQParkingSite/cuenta-usuario',[UsuarioAQParkingController::class,'show'])->name('cuenta-usuarioAQParking');
Route::get('/AQParkingSite/cuenta-usuario/restore-password',[UsuarioAQParkingController::class,'restore'])->name('restore-password');
Route::post('/AQParking/registro/newusuario',[UsuarioAQParkingController::class,'store'])->name('new-user');
Route::get('/AQParking/registro/usuario',[UsuarioAQParkingController::class,'registro'])->name('registro-usuario');
