@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Registro de usuario
@endsection

@section('content')
  <!-- BODY -->
  <div class="container w-75 my-5">
    <div class="row align-items-stretch">
        <div class="col-lg-6 col-md-12">
            <h2 class="fw-bold text-center py-5">Registrate</h2>
            <form class="usr-form" id="usr-form">
                <div class="mb-4">
                    <label for="nameRegistro" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nameRegistro" name="nameRegistro"
                        placeholder="Escribe acá tus nombres" required>
                </div>
                <div class="mb-4">
                    <label for="apellidosRegistro" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidosRegistro" name="apellidosRegistro"
                        placeholder="Escribe acá tus apellidos" required>
                </div>
                <div class="mb-4">
                    <label for="mailRegistro" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="mailRegistro" name="mailRegistro"
                        placeholder="name@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="registroPass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="registroPass" name="registroPass" placeholder="Contraseña" >
                </div>
                <div class="mb-4">
                    <label for="registroPass2" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" id="registroPass2" name="registroPass2" placeholder="Vuelva a escribir la contraseña">
                </div>
                <div class="mb-4">
                    <label for="tipoDocumento" class="form-label">Tipo de documento</label>
                    <select class="form-select" aria-label="tipoDocumento" id="tipoDocumento" required>
                        <option value="DNI">DNI</option>
                        <option value="Carnet de estranjeria">Carnet de estrangería</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nroDocumento" class="form-label">N° de documento</label>
                    <input type="text" class="form-control" id="nroDocumento" name="nroDocumento" placeholder=""
                        required pattern="[0-9]{8}">
                </div>
                <div class="mb-4">
                    <label for="nroCelular" class="form-label">N° de celular</label>
                    <input type="text" class="form-control" id="nroCelular" name="nroCelular" placeholder=""
                        required pattern="[0-9]{9}">
                </div>

                <div class="d-grid ">
                    <button class="btn btn-lg btn-primary rounded-pill" id="btn_login" name="btn-registro"
                        type="submit">Enviar</button>
                </div>
                <div class="my-3 text-center">
                    <span>¿Ya tienes cuenta? <a href="{{ route('login') }}">¡Inicia sesión!</a></span><br>
                    <span><a href="{{ route('recuperacion') }}">¿Olvidaste tu contraseña? Recuperaralá </a></span><br>
                    <span><a href="{{ route('terminos') }}">Terminos y condiciones</a></span>
                </div>
            </form>
        </div>
        <div class="col-lg-6 d-none d-lg-block imgRegistro ">
            <img src="/img/img_registro.jpg" alt="" style="width: 600px;">
        </div>
    </div>
</div>
  
@endsection

