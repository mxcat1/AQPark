@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Usuarios - Perfil
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 ">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">Perfil del Usuario</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <!-- Bg -->
            <div class="pt-20 rounded-top" style="background:url({{asset('images/background/profile-cover.jpg')}}) no-repeat; background-size: cover;">
            </div>
            <div class="bg-white rounded-bottom smooth-shadow-sm ">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row pt-4 pb-6 px-4">
                    <div class="d-flex align-items-center">
                        <!-- avatar -->
                        <div class="avatar-xxl avatar-indicators avatar-online me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                            <img src="{{asset("images/usuarioimg/".$usuarioselec->foto)}}" class="avatar-xxl rounded-circle border border-4 border-white-color-40" alt="">
                        </div>
                        <!-- text -->
                        <div class="lh-1">
                            <h2 class="mb-0">{{$usuarioselec->nombre .' '. $usuarioselec->apellido}}</h2>
                            <p class="mb-0 d-block">Rol: {{$usuarioselec->rol}}</p>
                        </div>
                    </div>
                    <div class="py-3">
                        <a href="{{route('Usuario.edit',$usuarioselec->usuario_ID)}}" class="btn btn-outline-primary">Editar Perfil del Usuario</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-5 justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-6">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <!-- card title -->
                    <h4 class="card-title mb-4">Datos del Usuario</h4>
                    <!-- row -->
                    <div class="row">
                        <div class="col-6 mb-5">
                            <h6 class="text-uppercase fs-5 ls-2">Telefono / Celular </h6>
                            <p class="mb-0">{{$usuarioselec->telefono}}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-uppercase fs-5 ls-2">Documento</h6>
                            <p class="mb-0">{{$usuarioselec->TipoDocumento->descripcion}}: {{$usuarioselec->documento}}</p>
                        </div>
{{--                        <div class="col-6 mb-5">--}}
{{--                            <h6 class="text-uppercase fs-5 ls-2">Fecha de Nacimiento</h6>--}}
{{--                            <p class="mb-0">01.10.1997</p>--}}
{{--                        </div>--}}
                        <div class="col-6">
                            <h6 class="text-uppercase fs-5 ls-2">Email </h6>
                            <p class="mb-0">{{$usuarioselec->email}}</p>
                        </div>
{{--                        <div class="col-6">--}}
{{--                            <h6 class="text-uppercase fs-5 ls-2">Direccion--}}
{{--                            </h6>--}}
{{--                            <p class="mb-0">Ahmedabad, India</p>--}}
{{--                        </div>--}}
                    </div>
                    @if(count($usuarioselec->Vehiculos))
                        <div class="row">
                            <h4 class="card-title my-4">Vehiculos en Propiedad</h4>
                            <div class="col-12 mb-5">
                                @foreach($usuarioselec->Vehiculos as $vehiculo)
                                    <li class="mb-0 d-flex flex-row justify-content-around align-items-center">
                                        Modelo: {{$vehiculo->modelo}} &nbsp | &nbsp Placa: {{$vehiculo->placa}}
                                        <a href="{{route('Vehiculo.edit',$vehiculo->vehiculo_ID)}}" title="Editar Datos del Vehiculo" class="btn btn-info">
                                            <i data-feather="edit" class="icon-xs"></i>
                                        </a>
                                        <div class="my-1">
                                            <form action="{{ route('Vehiculo.destroy',$vehiculo->vehiculo_ID) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este Elemento?');" class="btn btn-danger delete" >
                                                    <i data-feather="trash" class="icon-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <h4 class="card-title my-4">No es Propietario de Ningun Vehiculo</h4>
                    @endif

                    @if(count($usuarioselec->Estacionamientos))
                        <div class="row">
                            <h4 class="card-title my-4">Estacionamiento en Propiedad</h4>
                            <div class="col-12 mb-5">
                                @foreach($usuarioselec->Estacionamientos as $estacionamiento)
                                    <li class="mb-0 d-flex flex-row justify-content-around align-items-center">
                                        Nombre del Estacionamiento: {{$estacionamiento->nombre}}
                                        <a href="{{route('Estacionamiento.edit',$estacionamiento->estacionamiento_ID)}}" title="Editar Datos del Estacionamiento" class="btn btn-info">
                                            <i data-feather="edit" class="icon-xs"></i>
                                        </a>
                                        <a href="{{route('Estacionamiento.show',$estacionamiento->estacionamiento_ID)}}" title="Detalle del Estacionamiento" class="btn btn-primary mx-1">
                                            <i data-feather="eye" class="icon-xs"></i>
                                        </a>
                                        <div class="my-1">
                                            <form action="{{ route('Estacionamiento.destroy',$estacionamiento->estacionamiento_ID) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este Elemento?');" class="btn btn-danger delete" >
                                                    <i data-feather="trash" class="icon-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <h4 class="card-title my-4">No es Propietario de Ningun Estacionamiento</h4>
                    @endif

                    <div class="row pt-3">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{route('Usuario.index')}}" class="btn btn-danger mx-2">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
