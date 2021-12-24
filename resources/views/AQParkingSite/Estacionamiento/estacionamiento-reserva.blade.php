@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Reservación de estacionamiento
@endsection

@section('content')
    <!--BODY-->   
    <h2 class="text-center pt-xxl-3 my-5">RESERVA DE ESTACIONAMIENTO<br>{{$parking->nombre}}</h2>
    <div class="container pb-5 my-5">    
        <div class="form-wrapper pb-xxl-5">
            <div class="row">
                <div class="my-3">
                    @include('AQParkingSite.Mensajes.error')
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success my-3">
                        <p>{{ $message }}</p>
                    </div>
                    @elseif($message = Session::get('success delete'))
                    <div class="alert alert-danger my-3">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <form>
                    <div class="form">
                        <div class="mb-4">
                            <label for="vehiculoRegistrado" class="form-label">Vehículos Registrados</label>                            
                            <select class="form-select" aria-label="vehiculo" id="vehiculoRegistrado" required>
                                <option selected>Selecciona un vehículo</option>
                                @foreach($autos as $auto)
                                @if ($auto->usuario_ID === Auth::user()->usuario_ID)
                                        <option value="{{$auto->vehiculo_ID}}">{{$auto->marca}} {{$auto->modelo}}</option>
                                @endif
                                    @endforeach
                            </select>
                        </div>                        
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary">RESERVAR</button>
                        </div>
                    </div>
                </form>
                <h3 class="text-center mt-4 mt-md-5">Registra tu auto para hacer tu reserva</h3>
                <form action="{{route('registro-auto')}}" method="post">
                    @csrf
                        <div class="mb-3">
                            <label for="marcaVehiculo" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marcaVehiculo" name="marcaVehiculo"
                                placeholder="Hyundai" required>
                        </div>
                        <div class="mb-3">
                            <label for="modeloVehiculo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modeloVehiculo" name="modeloVehiculo"
                                placeholder="Tucson" required>
                        </div>
                        <div class="mb-3">
                            <label for="colorVehiculo" class="form-label">Color</label>
                            <input type="text" class="form-control" id="colorVehiculo" name="colorVehiculo"
                                placeholder="azul" required>
                        </div>
                        <div class="mb-3">
                            <label for="placaVehiculo" class="form-label">Placa vehicular</label>
                            <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo"
                                placeholder="XXX-123" required>
                        </div>
                        <div class="d-grid ">
                            <button type="submit" class="btn btn-primary">REGISTRAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

