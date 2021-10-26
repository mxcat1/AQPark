@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Tipo Documento - Detalle
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">TIPO DE DOCUMENTO - DETALLE</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="row mb-6">
            <div class="col-xl-6 col-lg-12 col-md-12 col-12 mb-6 mx-auto">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="card-title mb-4">Tipo de Documento Detalle</h4>
                        <span class="text-uppercase fw-medium text-dark fs-5 ls-2">Abreviacion: {{$tipodocu->abreviacion}}</span>
                        <!-- text -->
                        <p class="mt-2 mb-6"> <span class="text-uppercase text-dark">Descripcion Detallada:</span>
                            {{$tipodocu->descripcion}}
                        </p>
                        <p>Fecha de Creacion: {{$tipodocu->created_at}}</p>
                        <p>Fecha de Modificacion: {{$tipodocu->updated_at}}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('TipoDocumento.edit',$tipodocu->tipo_docu_ID)}}" type="submit" class="btn btn-info mx-2">Editar</a>
                            <a href="{{route('TipoDocumento.index')}}" class="btn btn-danger mx-2">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
