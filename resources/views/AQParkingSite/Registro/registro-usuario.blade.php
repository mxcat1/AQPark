@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Registro de usuario
@endsection

@section('content')
    <!--REGISTRO DE USUARIOS-->
    <div class="container  my-5">
        <div class="row align-items-stretch">
            @include('AQParkingSite.Mensajes.error')
            <div class="col-lg-6 col-md-12">
                <h2 class="fw-bold text-center py-5">Registrate</h2>
                <form action="{{route('new-user')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-bolder">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}"
                            placeholder="Escribe acá tus nombres" required>
                    </div>
                    <div class="mb-4">
                        <label for="apellido" class="form-label fw-bolder">Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}"
                            placeholder="Escribe acá tus apellidos" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label fw-bolder">Correo Electronico</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
                            placeholder="name@example.com" oninvalid="alert('Ingrese un correo electrónico válido');" 
                            pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$" required >
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bolder" for="foto">Foto del Usuario</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg">
                    </div>                    
                    <div class="mb-4">
                        <label for="tipo_documento" class="form-label fw-bolder">Tipo de documento</label>
                        <select class="form-select" aria-label="tipo_documento" id="tipo_documento" name="tipo_documento" required>
                            <option selected>Seleccione un Tipo de Documento</option>
                            <option value="1">DNI</option>
                            <option value="3">Carnet de extranjeria</option>
                        </select>
                    </div>                    
                    <div class="mb-4">
                        <label for="documento" class="form-label fw-bolder">N° de documento</label>
                        <input type="text" class="form-control" id="documento" name="documento" placeholder="Indique el número de su documento de identidad" value="{{old('documento')}}" required>
                    </div>
                    <div class="mb-4">
                        <label for="telefono" class="form-label fw-bolder">N° de celular</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" placeholder="Indique su número de celular" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-bolder">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Almenos una mayúscula, una minúscula y un número" required>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-bolder">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Vuelva a escribir la contraseña" required>
                    </div>

                    <div class="d-grid ">
                        <button class="btn btn-lg btn-primary rounded-pill" id="btn_login" name="btn-registro"
                            type="submit">Enviar</button>
                    </div>
                    <div class="my-3 text-center">
                        <span>¿Ya tienes cuenta? <a href="{{route('loginAQParking')}}">¡Inicia sesión!</a></span><br>
                        <span><a href="{{route('restore-password')}}">¿Olvidaste tu contraseña? Recuperaralá </a></span><br>
                        <span><a href="{{route('terminosAQParking')}}">Terminos y condiciones</a></span>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 d-none d-lg-block imgRegistro ">
                <img src="{{asset('img/img_registro.jpg')}}" alt="img-registro" style="width: 600px;">
            </div>

        </div>
    </div>
@endsection

