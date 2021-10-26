@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Tipo Documento - Editar
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">TIPO DE DOCUMENTO - EDITAR</h2>
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
                        <h2>Modificar Tipo de Documento</h2>
                    </div>
                </div>
                @include('AQParkingAdmin.partials.vererrores')
                <div class="card">
                    <div class="tab-content p-4">
                        <form action="{{route('TipoDocumento.update',$tipodocu->tipo_docu_ID)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="descripcion">Descripción del Tipo de Documento</label>
                                <input type="text" name="descripcion" id="descripcion" value="{{$tipodocu->descripcion}}" class="form-control form-control" placeholder="Indique el Tipo de Documento a Agregar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="abreviacion">Abreviación del Tipo de Documento</label>
                                <input type="text" name="abreviacion" id="abreviacion" value="{{$tipodocu->abreviacion}}" class="form-control form-control" placeholder="Indique la abreviación del Tipo de Documento a Agregar">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                                <a href="{{route('TipoDocumento.index')}}" class="btn btn-danger mx-2">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
