@extends('AQParkingSite.layouts.headerfooter')

@section('title')
Login
@endsection

@section('content')
<!-- BODY -->
<div class="container py-5 my-5">
    <div class="row py-5 align-items-stretch">
        <div class="col imglogin d-none d-md-block">
        </div>
        <div class="col">
            <div class="text-end">
                <img src="{{asset('img/logo.png')}}" width="48" alt="logo">
            </div>
            <h2 class="fw-bold text-center py-5">Iniciar Sesión</h2>
            <form method="POST" action="{{ route('autenticacionAQParking')}}">
                @csrf
                <div class="mb-4">
                    <label for="iptmail" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                </div>
                <div class="mb-4">
                    <label for="iptpass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña"
                        required>
                </div>
                <div class="mb-4 form-check">
                    <label for="iptchk" class="form-check-label">Mantenerme conectado</label>
                    <input type="checkbox" class="form-check-input" id="iptchklogin" name="iptchklogin">
                </div>
                @include('AQParkingSite.Mensajes.error')
                <div class="d-grid ">
                    <button class="btn btn-lg btn-primary rounded-pill" id="btn_login" name="btn_login"
                        type="submit">INICIAR
                        SESIÓN</button>
                </div>
                <div class="my-3 text-center">
                    <span>No tienes cuenta <a href="{{route('registroAQParking')}}">Registrate</a></span><br>
                    <span><a href="{{route('RecuperarPassword')}}">Recuperar Contraseña</a></span>
                </div>
            </form>
        </div>
    </div>
    <div>
    </div>
</div>
@endsection
