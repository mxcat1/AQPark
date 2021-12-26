@extends('AQParkingSite.layouts.headerfooter')

@section('title')
Control de Reservaciones
@endsection

@section('content')
<!-- BODY -->
<h2 class="text-center my-5 text-uppercase">historial de reservaciones <br> en {{$parking->nombre}}</h2>
@if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @elseif($message = Session::get('success delete'))
                    <div class="alert alert-danger my-3">
                        <p>{{ $message }}</p>
                    </div>
            @endif  
            @include('AQParkingSite.Mensajes.error') 

<div class="container py-5 my-5">
    <form class="d-inline-flex my-2 my-lg-0 ms-auto">
        <div class="input-group  mb-3 my-sm-3">
            <input class="form-control" type="search" placeholder="Busque por DNI" aria-label="Search"
                aria-describedby="barrabuscarheader">
            <button class="btn btn-primary" type="submit" id="barrabuscarheader"><i data-feather="search"></i></button>
        </div>
    </form>
    <div style="overflow-x:auto;">
        <table class="table align-middle" id="tableReserva">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estacionamiento</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Fecha de reserva</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Hora de Ingreso</th>
                    <th scope="col">Hora de salida</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                @if ($reserva->estacionamiento_ID == $parking->estacionamiento_ID)
                <tr>
                    <th scope="row">{{ $reserva->reserva_ID}}</th>
                    <td>{{ $reserva->estacionamiento_ID}}</td>
                    <td>{{ $reserva->vehiculo_ID}}</td>
                    <td>{{ $reserva->fecha}}</td>
                    <td>{{ $reserva->estado}}</td>
                    <td>{{ $reserva->ingreso}}</td>
                    <td>{{ $reserva->salida}}</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <a href="{{route('reserva-show',$reserva->reserva_ID)}}">
                            <button type="button" class="btn btn-warning btn-sm px-3" title="Editar reserva">
                                <i data-feather="edit"></i>
                            </button>
                            </a>
                        </span>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Cancelar reserva">
                            <i data-feather="delete"></i>
                        </button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <img src="{{asset('img/logo.png')}}" title="logo AQPparking" alt="logo AQPparking" class="img-fluid mt-5 d-none  d-xxl-block mx-auto mt-5 mb-3">
    {{-- <div class="button-add mt-5">
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#reservaRegistro">Agregar
            reserva</button>
        <div class="modal fade" id="reservaRegistro" tabindex="-1" aria-labelledby="reservaRegistro" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar reserva manualmente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-form">
                                <div class="mb-3">
                                    <label for="usrReserva" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" id="usrReserva" name="usrReserva"
                                        placeholder="example@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="dniReserva" class="form-label">Documento de identidad</label>
                                    <input type="text" class="form-control" id="usrReserva" name="usrReserva"
                                        placeholder="DNI o CE" required>
                                </div>
                                <div class="mb-3">
                                    <label for="placaVehiculo" class="form-label">Placa de vehículo</label>
                                    <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo"
                                        placeholder="ABC-123" required>
                                </div>

                                <div class="mb-3">
                                    <label for="fecReserva" class="form-label">Fecha</label>
                                    <input type="date" class="datepicker form-control" id="datepikr" name="datepikr"
                                        placeholder="" required>

                                </div>
                                <div class="mb-3">
                                    <label for="timepkr" class="form-label">Hora de Ingreso</label>
                                    <input type="text" class="timepicker form-control" id="timepkr" name="ingreso"
                                        placeholder="" required>

                                </div>
                                <div class="mb-3">
                                    <label for="timepkr" class="form-label">Hora de salida</label>
                                    <input type="text" class="timepicker form-control" id="timepkr" name="salida"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- MODAL PARA EDITAR -->


{{-- <div class="modal fade" id="editarReserva" tabindex="-1" aria-labelledby="editarReserva" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                   
                    <div class="modal-form">
                        <div class="mb-3">
                            <label for="usrReserva" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usrReserva" name="usrReserva"
                                placeholder="example@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="dniReserva" class="form-label">Documento de identidad</label>
                            <input type="text" class="form-control" id="usrReserva" name="usrReserva"
                                placeholder="DNI o CE" required>
                        </div>
                        <div class="mb-3">
                            <label for="placaVehiculo" class="form-label">Placa de vehículo</label>
                            <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo"
                                placeholder="ABC-123" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecReserva" class="form-label">Fecha</label>
                            <input type="date" class="datepicker form-control" id="datepikr" name="datepikr"
                                placeholder="" required>

                        </div>
                        <div class="mb-3">
                            <label for="timepkr" class="form-label">Hora de Ingreso</label>
                            <input type="text" class="timepicker form-control" id="timepkr" name="ingreso"
                                placeholder="" required>

                        </div>
                        <div class="mb-3">
                            <label for="timepkr" class="form-label">Hora de salida</label>
                            <input type="text" class="timepicker form-control" id="timepkr" name="salida" placeholder=""
                                required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection
