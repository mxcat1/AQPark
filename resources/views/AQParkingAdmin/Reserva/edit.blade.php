@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Reserva - Editar
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">Reserva - Editar</h2>
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
                        <h2>Editar Datos de la Reserva de Estacionamiento</h2>
                    </div>
                </div>
                <div class="card">
                    @include('AQParkingAdmin.partials.vererrores')
                    <div class="tab-content p-4">
                        <form action="{{route('Reserva.update',$reservaeditar->reserva_ID)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <p class="fw-bold">Fecha Registrada de la Reserva: <small>{{$reservaeditar->fecha}}</small></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="estacionamiento">Seleccion Estacionamiento - Propietario</label>
                                <select name="estacionamiento" id="estacionamiento">
                                    <option value="">Estacionamineto - Propietario</option>
                                    @foreach($listaestacionamientos as $estacionamiento)
                                        <option value="{{$estacionamiento->estacionamiento_ID}}" @if($reservaeditar->estacionamiento_ID==$estacionamiento->estacionamiento_ID) selected @endif>{{$estacionamiento->nombre}} - {{$estacionamiento->Usuario->nombre}} {{$estacionamiento->Usuario->apellido}}</option>
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
                                                <option value="{{$vehiculo->vehiculo_ID}}" @if($reservaeditar->vehiculo_ID==$vehiculo->vehiculo_ID) selected @endif>{{$usuario->nombre}} {{$usuario->apellido}} -> {{$vehiculo->modelo}} - {{$vehiculo->placa}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                {{--                                <a href="{{route('Vehiculo.create')}}" class="btn btn-secondary mx-2">Registrar Nuevo Vehiculo</a>--}}
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label class="form-label fw-bold" for="ingreso_vehiculo">Indique la Hora de Ingreso del Vehiculo</label>
                                    <p>Fecha y Hora Regisstrada:@if($reservaeditar->ingreso) {{$reservaeditar->ingreso}} @else Ninguna Fecha Registrada @endif</p>
                                    <input type="datetime-local" name="ingreso_vehiculo" id="ingreso_vehiculo" class="form-control" >
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label fw-bold" for="salida_vehiculo">Indique la Hora de Salida del Vehiculo</label>
                                    <p>Fecha y Hora Regisstrada:@if($reservaeditar->salida) {{$reservaeditar->salida}} @else Ninguna Fecha Registrada @endif</p>
                                    <input type="datetime-local" name="salida_vehiculo" id="salida_vehiculo" class="form-control" value="{{$reservaeditar->salida}}">
                                </div>
                            </div>
                            @if($reservaeditar->estado!="Reserva Concluida")
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="estado">Seleccion el estado de la Reserva</label>
                                    <select name="estado" id="estado" class="form-select">
                                        <option value="">Estado de la Reserva</option>
                                        <option value="Reservado" @if($reservaeditar->estado=="Reservado") selected @endif>Reservado: Se Espera la llegada del Vehiculo</option>
                                        <option value="Reserva en Espera" @if($reservaeditar->estado=="Reserva en Espera") selected @endif>Reserva en Espera: Falta Efectuar el Pago</option>
                                        <option value="Reserva Activa" @if($reservaeditar->estado=="Reserva Activa") selected @endif>Reserva Activa: El Vehiculo ha llegado al estacionamiento</option>
                                        <option value="Reserva Concluida" @if($reservaeditar->estado=="Reserva Concluida") selected @endif>Reserva Concluida: La reserva a concluido y se efectuo el pago y la salida del vehiculo se hizo con exito</option>
                                    </select>
                                </div>
                            @else
                                <div class="mb-3">
                                    <p class="form-label fw-bold">Estado de la Reserva: {{$reservaeditar->estado}}</p>
                                </div>
                            @endif
                            <div class="mb-3">
                                <p class="fw-bold">Cantidad de Horas que ha estado el vehiculo en el estacionamiento: <small>{{$reservaeditar->cantidad_horas}}</small></p>
                            </div>
                            <div class="mb-3">
                                <p class="fw-bold">Precio total de cobro por la reserva de estacionamiento: <small>S/. {{$reservaeditar->precio_total}}</small></p>
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
    <script type="text/javascript" src="{{asset('libs/moment/moment.js')}}"></script>

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

            let ingreso=document.getElementById('ingreso_vehiculo').value=moment(@json($reservaeditar->ingreso)).format("YYYY-MM-DDTHH:mm")
            let salida=document.getElementById('salida_vehiculo').value=moment(@json($reservaeditar->salida)).format("YYYY-MM-DDTHH:mm")
        })
    </script>
@endsection
