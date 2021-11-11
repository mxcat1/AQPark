@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Usuarios - Cambiar Contraseña
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">USUARIO - Cambiar Contraseña</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <!-- form -->
        <div class="row mb-6">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 mx-auto">
                <div class="d-flex justify-content-between">
                    <div class="mb-4">
                        <h2>Cambiar Contraseña del Usuario: {{$usuariocontraseña->nombre .' '.$usuariocontraseña->apellido}}</h2>
                    </div>
                </div>
                <div class="card">
                    @include('AQParkingAdmin.partials.vererrores')
                    <div class="tab-content p-4">
                        <form action="{{route('CambiarContraseñaUsuario',$usuariocontraseña->usuario_ID)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="password">Nueva Contraseña del Usuario </label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Indique la Contraseña del Usuario para Agregar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="password_confirmation">Confirmar Nueva Contraseña del Usuario </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Vuelva a escribir la contraseña para verificar">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-2">Guardar Nueva Contraseña</button>
                                <a href="{{route('Usuario.index')}}" class="btn btn-danger mx-2">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
