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

use App\Http\Controllers\AQParkingSistema\InicioAqparkingController;
use App\Http\Controllers\Auth\RecuperarPassword;
use App\Http\Controllers\Auth\RecuperarPasswordUsuarioController;
use App\Http\Controllers\Auth\RestablecerPassword;
use App\Http\Controllers\Auth\RestablecerPasswordUsuarioController;

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

Route::get('/Admin-Dashboard',[InicioController::class,'index'])->name('inicio')->middleware('authrol');


Route::resource('/Admin-Dashboard/TipoDocumento',TipoDocumentoController::class)->middleware('authrol');
Route::resource('/Admin-Dashboard/Usuario',UsuarioController::class)->middleware('authrol');
Route::resource('/Admin-Dashboard/Vehiculo',VehiculoController::class)->middleware('authrol');
Route::resource('/Admin-Dashboard/Estacionamiento',EstacionamientoController::class)->middleware('authrol');
Route::resource('/Admin-Dashboard/Reserva',ReservaController::class)->middleware('authrol');

Route::get('/Admin-Dashboard/Usuario/CambiarPassword/{Usuario}',[UsuarioController::class,'cambiarpasswordvista'])->name('CambiarContraseña')->middleware('authrol');
Route::put('/Admin-Dashboard/Usuario/CambiarPassword/{Usuario}',[UsuarioController::class,'cambiarpassword'])->name('CambiarContraseñaUsuario')->middleware('authrol');

Route::get('/Admin-Dashboard/login-administrador-sistema',[AutenticateAdminController::class,'login'])->name('LoginAdministrador')->middleware('logincontrol');
Route::post('/iniciarsession',[AutenticateAdminController::class,'autenticate'])->name('LoginAutenticacion')->middleware('logincontrol');;
Route::post('/cerrarsession',[AutenticateAdminController::class,'logout'])->name('LoginDesautenticacion')->middleware('authrol');


//Rutas para Recuperar Contraseña Area de Administracion del Sistema
Route::get('/Recuperar-Contraseña',[RecuperarPassword::class,'index'])->name('RecuperarPassword')->middleware('guest');
Route::post('/Recuperar-Contraseña',[RecuperarPassword::class,'store'])->name('RecuperarPassword.email')->middleware('guest');
Route::get('/Recuperar-Contraseña-Notificacion',[RecuperarPassword::class,'respuesta'])->name('RecuperarPassword.notificacion')->middleware('guest');

//Rutas para Reiniciar Contraseña Usuarios Naturales y Adminsitradores de Estacionamientos
Route::get('/Restablecer-Contraseña/{token}',[RestablecerPassword::class,'index'])->name('password.reset')->middleware('guest');
Route::post('/Restablecer-Contraseña',[RestablecerPassword::class,'store'])->name('password.update')->middleware('guest');

//Verificacion de Correo

Route::get('/verify-email', [\App\Http\Controllers\Auth\VerificacionCorreoPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [\App\Http\Controllers\Auth\VerificacionCorreoController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [\App\Http\Controllers\Auth\VerificacionCorreoNotificacionController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// RUTAS AQParkingSite

Route::get('/',[AQParkingController::class,'index'])->name('indexAQParking')->middleware('userloged');
Route::get('/registro',[AQParkingController::class,'registro'])->name('registroAQParking');
Route::get('/politica-de-cookies',[AQParkingController::class,'cookies'])->name('cookiesAQParking');
Route::get('/politica-de-privacidad',[AQParkingController::class,'privacidad'])->name('privacidadAQParking');
Route::get('/terminos-y-condiciones',[AQParkingController::class,'terminos'])->name('terminosAQParking');

    //AUTENTICACION
Route::get('/login',[AutenticacionUserController::class,'login'])->name('loginAQParking')->middleware('userloged');
Route::post('/Sesionusuario',[AutenticacionUserController::class,'autenticacion'])->name('autenticacionAQParking');
Route::post('/Cerrarsesion',[AutenticacionUserController::class,'logout'])->name('logout');

    //ESTACIONAMIENTO
Route::get('/AQParkingSite/detalles-estacionamiento/{estacionamiento}',[EstacionamientoAQParkingController::class,'details'])->name('estacionamientoAQParking')->middleware('usercheck');
Route::get('/AQParkingSite/cuenta-estacionamiento/{usuario}',[EstacionamientoAQParkingController::class,'show'])->name('cuenta-estacionamientoAQParking')->middleware('authro2');
Route::get('/AQParkingSite/cuenta-estacionamiento/control-reservas/{usuario}',[EstacionamientoAQParkingController::class,'control'])->name('control-reservasAQParking')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambiodireccion/{parking}',[EstacionamientoAQParkingController::class,'updatedireccion'])->name('cambiodir_ref')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambiohorario/{parking}',[EstacionamientoAQParkingController::class,'updatehorario'])->name('cambioatencion')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambioprecio/{parking}',[EstacionamientoAQParkingController::class,'updateprice'])->name('cambioprecio')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambiocapacidad/{parking}',[EstacionamientoAQParkingController::class,'updatecapacidad'])->name('cambiocapacidad')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambiofoto/{parking}',[EstacionamientoAQParkingController::class,'updatefoto'])->name('cambiofoto')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambioespacios/{parking}',[EstacionamientoAQParkingController::class,'updatespaces'])->name('cambioespacios')->middleware('authro2');
Route::put('/AQParkingSite/cuenta-estacionamiento/control-reservas/cambioestado/{parking}',[EstacionamientoAQParkingController::class,'updatestado'])->name('cambioestado')->middleware('authro2');

    //REGISTROPARKING
Route::get('/registro/estacionamiento',[RegistroParkingController::class,'index'])->name('registro-estacionamiento');
Route::post('/registro/estacionamiento',[RegistroParkingController::class,'store'])->name('create-parking');


    //RESERVAPARKING
Route::get('/AQParkingSite/detalles-estacionamiento/reserva/{estacionamiento}',[ReservaParkingController::class,'index'])->name('reserva-estacionamiento')->middleware('usercheck');
Route::get('/AQParkingSite/detalles-estacionamiento/reserva/{estacionamiento}/confirmacion',[ReservaParkingController::class,'check'])->name('reserva-confirmacion')->middleware('usercheck');
Route::post('/AQParkingSite/detalles-estacionamiento/reserva/',[ReservaParkingController::class,'store'])->name('proceso-reserva')->middleware('usercheck');
Route::post('/AQParkingSite/detalles-estacionamiento/reserva/registro_auto',[UsuarioAQParkingController::class,'store_auto'])->name('registro-auto')->middleware('usercheck');
Route::get('/AQParkingSite/detalles-estacionamiento/reserva/edit/{reserva}',[ReservaParkingController::class,'show'])->name('reserva-show')->middleware('usercheck');
Route::put('/AQParkingSite/detalles-estacionamiento/reserva/edit/{reserva}',[ReservaParkingController::class,'update'])->name('reserva-update')->middleware('usercheck');
Route::delete('/AQParkingSite/detalles-estacionamiento/reserva/edit/{reserva}',[ReservaParkingController::class,'destroy'])->name('reserva-delete')->middleware('usercheck');

    //USUARIO
Route::get('/AQParkingSite',[UsuarioAQParkingController::class,'index'])->name('main-pageAQParking')->middleware('usercheck');
Route::get('/AQParkingSite/cuenta-usuario',[UsuarioAQParkingController::class,'show'])->name('cuenta-usuarioAQParking')->middleware('usercheck');
Route::get('/AQParkingSite/cuenta-usuario/restore-password',[UsuarioAQParkingController::class,'restore'])->name('restore-password')->middleware('usercheck');
Route::post('/registro/newusuario',[UsuarioAQParkingController::class,'store'])->name('new-user');
Route::get('/registro/usuario',[UsuarioAQParkingController::class,'registro'])->name('registro-usuario');
Route::put('/AQParkingSite/cuenta-usuario/update-data/{usuario}', [UsuarioAQParkingController::class, 'update'])->name('updateusuario')->middleware('usercheck');
Route::put('/AQParkingSite/cuenta-usuario/change-password/{usuario}', [UsuarioAQParkingController::class, 'changepassword'])->name('updatepassword')->middleware('usercheck');

    //VEHICULO
Route::delete('/AQParkingSite/cuenta-usuario/update-data/{vehiculo}', [UsuarioAQParkingController::class, 'vehiculo_destroy'])->name('borrar_vehiculo')->middleware('usercheck');

