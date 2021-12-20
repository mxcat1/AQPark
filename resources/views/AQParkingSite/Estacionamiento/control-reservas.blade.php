@extends('AQParkingSite.layouts.headerfooter')

@section('title')
Control de Reservaciones
@endsection

@section('content')
    <!-- BODY -->
    <h2 class="text-center my-5 text-uppercase">historial de reservaciones <br> en {{$parking->nombre}}</h2>
    
    <div class="container py-5 my-5">
        <form class="d-inline-flex my-2 my-lg-0 ms-auto">
            <div class="input-group  mb-3 my-sm-3">
                <input class="form-control" type="search" placeholder="Busque por DNI" aria-label="Search"
                    aria-describedby="barrabuscarheader">
                <button class="btn btn-primary" type="submit" id="barrabuscarheader"><i
                        data-feather="search"></i></button>
            </div>
        </form>
        <div style="overflow-x:auto;">

            <table class="table align-middle" id="tableReserva">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Dni</th>             
                    <th scope="col">Placa de vehículo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora de Ingreso</th>
                    <th scope="col">Hora de salida</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>algo@gmail.com</td>
                    <td>789456321</td>
                    <td>ABC-123</td>
                    <td>05/12/2021</td>
                    <td>10:14</td>
                    <td>--</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar reserva" >
                                <i data-feather="edit"></i>
                            </button>
                        </span>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar reserva">
                            <i data-feather="delete"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>algo@gmail.com</td>
                    <td>789456321</td>
                    <td>ABC-123</td>
                    <td>05/12/2021</td>
                    <td>9:00</td>
                    <td>--</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar reserva" >
                                <i data-feather="edit"></i>
                            </button>
                        </span>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar reserva">
                            <i data-feather="delete"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>algo@gmail.com</td>
                    <td>789456321</td>
                    <td>ABC-123</td>
                    <td>04/11/2021</td>
                    <td>21:15</td>
                    <td>22:05</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar reserva" >
                                <i data-feather="edit"></i>
                            </button>
                        </span>
                    <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar reserva">
                        <i data-feather="delete"></i>
                    </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>algo@gmail.com</td>
                    <td>789456321</td>
                    <td>ABC-123</td>
                    <td>04/12/2021</td>
                    <td>10:14</td>
                    <td>12:12</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar reserva" >
                                <i data-feather="edit"></i>
                            </button>
                        </span>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar reserva">
                            <i data-feather="delete"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>algo@gmail.com</td>
                    <td>789456321</td>
                    <td>ABC-123</td>
                    <td>03/12/2021</td>
                    <td>20:14</td>
                    <td>21:10</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar reserva" >
                                <i data-feather="edit"></i>
                            </button>
                        </span>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar reserva">
                            <i data-feather="delete"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>algo@gmail.com</td>
                    <td>789456321</td>
                    <td>ABC-123</td>
                    <td>03/12/2021</td>
                    <td>17:14</td>
                    <td>17:12</td>
                    <td>
                        <span data-bs-toggle="modal" data-bs-target="#editarReserva">
                            <button type="button" class="btn btn-warning btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar reserva" >
                                <i data-feather="edit"></i>
                            </button>
                        </span>
                        <button type="button" class="btn btn-danger btn-sm px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar reserva">
                            <i data-feather="delete"></i>
                        </button>
                    </td>
                </tr>
                
                </tbody>
            </table>
        </div>    
        <div class="button-add mt-5">
            <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#reservaRegistro">Agregar reserva</button>
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
                                    <input type="date" class="datepicker form-control" id="datepikr" name="datepikr" placeholder="" required>

                                </div>
                                <div class="mb-3">
                                    <label for="timepkr" class="form-label">Hora de Ingreso</label>
                                    <input type="text" class="timepicker form-control" id="timepkr" name="ingreso" placeholder="" required>

                                </div>
                                <div class="mb-3">
                                    <label for="timepkr" class="form-label">Hora de salida</label>
                                    <input type="text" class="timepicker form-control" id="timepkr" name="salida" placeholder="">
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
        </div>
    </div>

    <!-- MODAL PARA EDITAR -->


    <div class="modal fade" id="editarReserva" tabindex="-1" aria-labelledby="editarReserva" aria-hidden="true">
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
                            <input type="date" class="datepicker form-control" id="datepikr" name="datepikr" placeholder="" required>

                        </div>
                        <div class="mb-3">
                            <label for="timepkr" class="form-label">Hora de Ingreso</label>
                            <input type="text" class="timepicker form-control" id="timepkr" name="ingreso" placeholder="" required>

                        </div>
                        <div class="mb-3">
                            <label for="timepkr" class="form-label">Hora de salida</label>
                            <input type="text" class="timepicker form-control" id="timepkr" name="salida" placeholder="" required>
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
@endsection