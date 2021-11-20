@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Vehiculos - Editar
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">VEHICULO - EDITAR</h2>
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
                        <h2>Editar Datos del Vehiculo</h2>
                    </div>
                </div>
                <div class="card">
                    @include('AQParkingAdmin.partials.vererrores')
                    <div class="tab-content p-4">
                        <form action="{{route('Vehiculo.update',$vehiculoedit->vehiculo_ID)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="modelo">Modelo del Vehiculo</label>
                                <input type="text" name="modelo" id="modelo" class="form-control" value="{{$vehiculoedit->modelo}}" placeholder="Indique el Modelos del Vehiculo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="marca">Marca del Vehiculo</label>
                                <input type="text" name="marca" id="marca" class="form-control" value="{{$vehiculoedit->marca}}" placeholder="Indique la Marca del Vehiculo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="color">Color del Vehiculo</label>
                                <input type="text" name="color" id="color" class="form-control" value="{{$vehiculoedit->color}}" placeholder="Indique el Color dlle Vehiculo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="placa">Placa del Vehiculo</label>
                                <input type="text" name="placa" id="placa" class="form-control" value="{{$vehiculoedit->placa}}" placeholder="Indique la Placa del Vehiculo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="usuario">Propietario del Vehiculo</label>
                                <p class="fw-bold">Propietario Actual: {{$vehiculoedit->Usuario->nombre}} {{$vehiculoedit->Usuario->apellido}}</p>
                                <select name="usuario" id="usuario" class="form-select">
                                    <option value="">Seleccione al Propietario del Vehiculo</option>
                                    @foreach($listadousuarios as $usuario)
                                        <option value="{{$usuario->usuario_ID}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-2">Crear</button>
                                <a href="{{route('Vehiculo.index')}}" class="btn btn-danger mx-2">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
