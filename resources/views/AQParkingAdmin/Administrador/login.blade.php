@extends('AQParkingAdmin.layouts._layoutBlank')

@section('title')
    Login Administrador - AQParking
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
                        <p class="mb-6">Login Para el Administrador del Sistema</p>
                    </div>
                    <!-- Form -->
                    <form method="post" action="{{route('LoginAutenticacion')}}">
                        @csrf
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Direccion de Correo Electronico" required="">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="form-check custom-checkbox">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="form-check-label" for="remember_me">Recordarme</label>
                            </div>

                        </div>
                            @include('AQParkingAdmin.partials.vererrores')
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Iniciar Sessión</button>
                            </div>

                            <div class="d-md-flex justify-content-end mt-4">
                                <div>
                                    <a href="forget-password.html" class="text-inherit fs-5">Recuperar Contraseña</a>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
