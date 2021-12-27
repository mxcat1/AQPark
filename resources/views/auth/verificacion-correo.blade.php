@extends('AQParkingAdmin.layouts._layoutBlank')

@section('title')
    Verificacion de Correo - AQParking
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
                        <p class="mb-6">Verificacion de Correo</p>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        <span>
                            Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.
                        </span>
                    </div>
                    <div class="mb-4">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit">Reenviar Correo de Verificacion</button>
                            </div>
                        </form>
                    </div>
                    <div class="mb-4">
                        <form method="POST" action="{{ route('LoginDesautenticacion') }}">
                            @csrf

                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                Cerrar Session
                            </button>
                        </form>
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
