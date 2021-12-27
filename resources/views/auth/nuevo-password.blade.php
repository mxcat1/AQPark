@extends('AQParkingAdmin.layouts._layoutBlank')

@section('title')
    Restablecer Contraseña - AQParking
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
                        <p class="mb-6">Restablecer Contraseña del Administrador</p>
                    </div>
                    <!-- Form -->
                    <form method="post" action="{{route('password.update')}}">
                    @csrf
                    <!-- Username -->
                        <input type="hidden" name="token" value="{{$request->route('token')}}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Direccion de Correo Electronico" required="">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="**************" required="">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        @include('AQParkingAdmin.partials.vererrores')
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Restablecer Contraseña</button>
                            </div>

                            <div class="d-md-flex justify-content-end mt-4">
                                <div>
                                    <a href="{{route('indexAQParking')}}" class="text-inherit fs-5">Volver</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
