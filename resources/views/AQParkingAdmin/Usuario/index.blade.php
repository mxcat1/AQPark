@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Usuarios - Inicio
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">USUARIOS - INICIO</h2>
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
                        <h2>Listado de Los Usuarios</h2>
                    </div>
                    <div>
                        <a href="{{route('Usuario.create')}}" class="btn btn-success">Crear Usuario</a>
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
                        @if (count($listausuarios)>0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listausuarios as $item)
                                        <tr>

                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->apellido}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->rol}}</td>
                                            <td><img src="/images/usuarioimg/{{$item->foto}}" class="rounded-circle" alt="foto {{$item->nombre}}" width="50px"></td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{route('Usuario.show',$item->usuario_ID)}}" title="Detalle Usuario" class="btn btn-primary mx-1">
                                                    <i data-feather="eye" class="icon-xs"></i>
                                                </a>
                                                <a href="{{route('Usuario.edit',$item->usuario_ID)}}" title="Editar Datos Usuario" class="btn btn-info mx-1">
                                                    <i data-feather="edit" class="icon-xs"></i>
                                                </a>
                                                <form action="{{ route('Usuario.destroy',$item->usuario_ID) }}" method="POST">
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
                            {{ $listausuarios->links() }}
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
