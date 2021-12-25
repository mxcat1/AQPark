@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Reserva - Crear
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">Reserva - NUEVO</h2>
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
                        <h2>Registrar nueva Reserva de Estacionamiento</h2>
                    </div>
                </div>
                <div class="card">
                    @include('AQParkingAdmin.partials.vererrores')
                    <div class="tab-content p-4">
                        <form action="{{route('Reserva.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="estacionamiento">Seleccion Estacionamiento - Propietario</label>
                                <select name="estacionamiento" id="estacionamiento">
                                    <option value="">Estacionamineto - Propietario</option>
                                    @foreach($listaestacionamientos as $estacionamiento)
                                        <option value="{{$estacionamiento->estacionamiento_ID}}">{{$estacionamiento->nombre}} - {{$estacionamiento->Usuario->nombre}} {{$estacionamiento->Usuario->apellido}} - {{$estacionamiento->capacidad_actual}}</option>
                                    @endforeach
                                </select>
{{--                                <a href="{{route('Estacionamiento.create')}}" class="btn btn-secondary mx-2">Registrar Nuevo Estacionamiento</a>--}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="vehiculo">Seleccione Propietario del Vehiculo y Modelo - Placa del Vehiculo</label>
                                <select name="vehiculo" id="vehiculo">
                                    <option value="">Propietario Vehiculo - Modelo Vehiculo - Placa Vehiculo</option>
                                    @foreach($listausuarios as $usuario)
                                        <optgroup label="{{$usuario->nombre}} {{$usuario->apellido}}">
                                            @foreach($usuario->Vehiculos as $vehiculo)
                                                <option value="{{$vehiculo->vehiculo_ID}}">{{$usuario->nombre}} {{$usuario->apellido}} -> {{$vehiculo->modelo}} - {{$vehiculo->placa}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
{{--                                <a href="{{route('Vehiculo.create')}}" class="btn btn-secondary mx-2">Registrar Nuevo Vehiculo</a>--}}
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-2">Crear</button>

                                <a href="{{route('Reserva.index')}}" class="btn btn-danger mx-2">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
@section('myscript')

    <script>
        $(document).ready(function() {
            $("#vehiculo").selectize({
                create: true,
                sortField: "text",
            });
            $("#estacionamiento").selectize({
                create: true,
                sortField: "text",
            });
        })
    </script>
@endsection
