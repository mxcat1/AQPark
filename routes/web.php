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

Route::get('/AQParking',[AQParkingController::class,'index'])->name('indexAQParking')->middleware('userloged');
Route::get('/AQParking/registro',[AQParkingController::class,'registro'])->name('registroAQParking');
Route::get('/AQParking/politica-de-cookies',[AQParkingController::class,'cookies'])->name('cookiesAQParking');
Route::get('/AQParking/politica-de-privacidad',[AQParkingController::class,'privacidad'])->name('privacidadAQParking');
Route::get('/AQParking/terminos-y-condiciones',[AQParkingController::class,'terminos'])->name('terminosAQParking');

    //AUTENTICACION
Route::get('/AQParking/login',[AutenticacionUserController::class,'login'])->name('loginAQParking')->middleware('userloged');
Route::post('/Sesionusuario',[AutenticacionUserController::class,'autenticacion'])->name('autenticacionAQParking');
Route::post('/Cerrarsesion',[AutenticacionUserController::class,'logout'])->name('logout');

    //ESTACIONAMIENTO
Route::get('/AQParkingSite/detalles-estacionamiento/{estacionamiento}',[EstacionamientoAQParkingController::class,'details'])->name('estacionamientoAQParking')->middleware('usercheck');
Route::get('/AQParkingSite/cuenta-estacionamiento/{usuario}',[EstacionamientoAQParkingController::class,'show'])->name('cuenta-estacionamientoAQParking')->middleware('authro2');
Route::get('/AQParkingSite/cuenta-estacionamiento/control-reservas/{usuario}',[EstacionamientoAQParkingController::class,'control'])->name('control-reservasAQParking')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/{parking}',[EstacionamientoAQParkingController::class,'updatedireccion'])->name('cambiodir_ref')->middleware('authro2');

    //REGISTROPARKING
Route::get('/AQParking/registro/estacionamiento',[RegistroParkingController::class,'index'])->name('registro-estacionamiento');
Route::post('/AQParking/registro/estacionamiento',[RegistroParkingController::class,'store'])->name('create-parking');


    //RESERVAPARKING
Route::get('/AQParkingSite/detalles-estacionamiento/reserva/{estacionamiento}',[ReservaParkingController::class,'index'])->name('reserva-estacionamiento')->middleware('usercheck');
Route::get('/AQParkingSite/detalles-estacionamiento/reserva/confirmacion',[ReservaParkingController::class,'check'])->name('reserva-confirmacion')->middleware('usercheck');

    //USUARIO
Route::get('/AQParkingSite',[UsuarioAQParkingController::class,'index'])->name('main-pageAQParking')->middleware('usercheck');
Route::get('/AQParkingSite/cuenta-usuario',[UsuarioAQParkingController::class,'show'])->name('cuenta-usuarioAQParking')->middleware('usercheck');
Route::get('/AQParkingSite/cuenta-usuario/restore-password',[UsuarioAQParkingController::class,'restore'])->name('restore-password')->middleware('usercheck');
Route::post('/AQParking/registro/newusuario',[UsuarioAQParkingController::class,'store'])->name('new-user');
Route::get('/AQParking/registro/usuario',[UsuarioAQParkingController::class,'registro'])->name('registro-usuario');
Route::put('/AQParkingSite/cuenta-usuario/update-data/{usuario}', [UsuarioAQParkingController::class, 'update'])->name('updateusuario')->middleware('usercheck');
Route::put('/AQParkingSite/cuenta-usuario/change-password/{usuario}', [UsuarioAQParkingController::class, 'changepassword'])->name('updatepassword')->middleware('usercheck');
