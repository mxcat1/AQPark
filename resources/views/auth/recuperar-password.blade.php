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
                            ¿Olvidaste tu contraseña? No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
                        </span>
                    </div>
                    <!-- Form -->
                    <form method="post" action="{{route('RecuperarPassword.email')}}">
                    @csrf
                    <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Direccion de Correo Electronico" required="">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @include('AQParkingAdmin.partials.vererrores')
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
                            </div>

                            <div class="d-md-flex justify-content-end mt-4">
                                <div>
                                    <a href="{{route('indexAQParking')}}" class="btn btn-warning">Volver</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
