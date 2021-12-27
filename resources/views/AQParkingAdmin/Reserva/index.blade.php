@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Reservas de Estacionamiento - Inicio
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">RESERVAS DE ESTACIONAMIENTO - INICIO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <!-- table -->
        <div class="row mb-6">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="d-flex justify-content-between">
                    <div class="mb-4">
                        <h2>Listado de Reservas Registradas Registrados</h2>
                    </div>
                    <div>
                        <a href="{{route('Reserva.create')}}" class="btn btn-success">Registrar Nueva Reserva</a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @elseif($message = Session::get('success delete'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
            @endif

            <!-- Card -->
                <div class="card">
                    <!-- Tab content -->
                    <div class="tab-content p-4">
                        <!-- Basic table -->
                        @if (count($reservaslista)>0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Estacionamiento</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Vehiculo</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservaslista as $item)
                                        <tr>

                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td>{{$item->Estacionamiento->nombre}}</td>
                                            <td>{{$item->Vehiculo->Usuario->nombre}} {{$item->Vehiculo->Usuario->apellido}}</td>
                                            <td>{{$item->Vehiculo->placa}}</td>
                                            <td>{{$item->fecha}}</td>
                                            <td>{{$item->estado}}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('Reserva.show',$item->reserva_ID)}}" title="Detalle del Estacionamiento" class="btn btn-primary mx-1">
                                                    <i data-feather="eye" class="icon-xs"></i>
                                                </a>
                                                <a href="{{route('Reserva.edit',$item->reserva_ID)}}" title="Editar Datos del Estacionamiento" class="btn btn-info mx-1">
                                                    <i data-feather="edit" class="icon-xs"></i>
                                                </a>
                                                <form action="{{ route('Reserva.destroy',$item->reserva_ID) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este Elemento?');" class="btn btn-danger delete" >
                                                        <i data-feather="trash" class="icon-xs"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $reservaslista->links() }}
                        @else
                            <h3>Ningun Registro aun</h3>
                    @endif
                    <!-- Basic table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- table -->
    </div>
@endsection
