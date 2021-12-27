@extends('AQParkingAdmin.layouts._layoutBlank')

@section('title')
    Recuperar Contraseña - AQParking
@endsection

@section('content')
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4 text-center">
                        <a href="#" class="navbar-brand"><span style="font-size:30px">AQParking</span></a>
                        <p class="mb-6">Recuperar COntraseña</p>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        <span>
                            El Correo de Verificacion para Recuperar la Contraseña se Envio con Exito puede revisar su casilla de correo o si no encontrarlo en la parte de Spam.
                        </span>
                    </div>
                    <div class="d-md-flex justify-content-end mt-4">
                        <div>
                            <a href="{{route('inicio')}}" class="btn btn-warning">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
