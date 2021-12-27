@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Reserva - Datos
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">Reserva - Datos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <!-- form -->
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-md-8 col-sm-8 col-12 mx-auto">
                <div class="d-flex justify-content-xl-between">
                    <div class="mb-4">
                        <h2>Datos de la Reserva en el Estacionamiento: {{$reserva->Estacionamiento->nombre}}</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="tab-content p-2">
                        <div class="row m-0">
                            <h3 class="text-uppercase fw-bold m-3 text-center">Datos Generales de la Reserva</h3>
                            <div class="col-xl-12 col-sm-12 mb-5">
                                <div class="row">
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Fecha Realizada de la Reserva</h6>
                                        <p class="mb-0">{{$reserva->fecha}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Estado de la Reserva</h6>
                                        <p class="mb-0">{{$reserva->estado}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Ingreso dee Vehiculo al Estacionamiento </h6>
                                        <p class="mb-0">{{$reserva->ingreso}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Salida dee Vehiculo al Estacionamiento </h6>
                                        <p class="mb-0">{{$reserva->salida}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Cantidad de horas de la Reserva</h6>
                                        <p class="mb-0">{{$reserva->cantidad_horas}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Precio Total de la Reserva</h6>
                                        <p class="mb-0">S./{{$reserva->precio_total}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <h3 class="text-uppercase fw-bold m-3 text-center">Datos del Estacionamiento para la Reserva</h3>
                            <div class="col-xl-6 col-sm-12 my-2">
                                <img src="{{asset('images/estacionamientos/'.$reserva->Estacionamiento->foto)}}" class="rounded-3 w-100" alt="{{$reserva->Estacionamiento->nombre}}">
                            </div>
                            <div class="col-xl-6 col-sm-12 my-2">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Nombre del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->nombre}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Dirrrecion del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->direccion}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Telefono del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->telefono}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Distrito del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->distrito}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5 ">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Referencia del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->referencia}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5 ">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Propietario del Estacionamiento</h6>
                                        <a href="{{route('Usuario.show',$reserva->Estacionamiento->usuario->usuario_ID)}}" class="mb-0" title="Detalle del Propietario">
                                            {{$reserva->Estacionamiento->usuario->nombre." ".$reserva->Estacionamiento->usuario->apellido}}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Precio del Estacionamiento</h6>
                                        <p class="mb-0">S./{{$reserva->Estacionamiento->precio}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Estado del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->estado}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Hora de Apertura</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->apertura}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Hora de Cierre</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->cierre}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Capacidad Actual del Estacionamiento</h6>
                                        <p class="mb-0">{{$reserva->Estacionamiento->capacidad_actual}} Espacios Disponibles</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <a href="{{route('Estacionamiento.show',$reserva->Estacionamiento->estacionamiento_ID)}}" class="btn btn-info mx-2">Ver mas sobre el Estacionamiento</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-4">
                            <h3 class="text-uppercase fw-bold m-3 text-center">Datos del Usuario y su Vehiculo para la reserva Reserva</h3>
                            <div class="col-xl-12 col-sm-12 mb-5">
                                <div class="row">
                                    <div class="col-xl-2 col-sm-2 mb-5">
                                        <div class="avatar-xxl me-2 position-relative d-flex justify-content-end align-items-end mt-n10">
                                            @if($reserva->Vehiculo->Usuario->foto=="foto-perfil.jpg")
                                                <img src="/images/avatar/{{$reserva->Vehiculo->Usuario->foto}}" class="rounded-circle" alt="foto {{$reserva->Vehiculo->Usuario->nombre}}" width="50px">
                                            @else
                                                <img src="/images/usuarioimg/{{$reserva->Vehiculo->Usuario->foto}}" class="rounded-circle" alt="foto {{$reserva->Vehiculo->Usuario->nombre}}" width="50px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Nombre y Apellidos</h6>
                                        <p class="mb-0">{{$reserva->Vehiculo->Usuario->nombre}} {{$reserva->Vehiculo->Usuario->apellido}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Placa del Vehiculo</h6>
                                        <p class="mb-0">{{$reserva->Vehiculo->placa}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Marca del Vehiculo</h6>
                                        <p class="mb-0">{{$reserva->Vehiculo->marca}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Modelo del Vehiculo</h6>
                                        <p class="mb-0">{{$reserva->Vehiculo->modelo}}</p>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Color del Vehiculo</h6>
                                        <p class="mb-0">{{$reserva->Vehiculo->color}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{route('Reserva.edit',$reserva->reserva_ID)}}" class="btn btn-info mx-2">Editar</a>
                                <a href="{{route('Reserva.index')}}" class="btn btn-danger mx-2">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
