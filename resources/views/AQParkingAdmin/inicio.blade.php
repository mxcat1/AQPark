@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Inicio
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- text -->
            <div class="text-center mb-7">
                <h1 class="display-4">Bienvenido al Administrador del Sistema de AQParking</h1>
                <p>Como Administrador tiene acceso a todo los datos,
                    tablas y funciones para poder tener una buena administracion del sistema
                </p>
            </div>
            <span class="divider fw-bold my-3">Gracias Por leer antes de comenzar</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold text-black">Datos del Sistema</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                    mb-3">
                        <div>
                            <h4 class="mb-0">Tablas</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                            <i class="bi bi-list-task fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$datosbd['Tablas']}}</h1>
                        <p class="mb-0"><span class="text-dark me-2">{{$datosbd['Tablas']}}</span>Estado Activo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                    mb-3">
                        <div>
                            <h4 class="mb-0">Usuarios</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                            <i class="bi bi-list-task fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$datosbd['Usuarios']}}</h1>
                        <p class="mb-0"><span class="text-dark me-2">{{$datosbd['Usuarios']}}</span>Registrados</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                    mb-3">
                        <div>
                            <h4 class="mb-0">Vehiculos</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                            <i class="bi bi-list-task fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$datosbd['Vehiculos']}}</h1>
                        <p class="mb-0"><span class="text-dark me-2">{{$datosbd['Vehiculos']}}</span>Registrados</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card rounded-3">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                    mb-3">
                        <div>
                            <h4 class="mb-0">Estacionamientos</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-1">
                            <i class="bi bi-list-task fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$datosbd['Estacionamientos']}}</h1>
                        <p class="mb-0"><span class="text-dark me-2">{{$datosbd['Estacionamientos']}}</span>Activos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
