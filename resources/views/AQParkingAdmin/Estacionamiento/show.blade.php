@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Estacionamiento - Datos
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">Estacionamiento - Datos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <!-- form -->
        <div class="row">
            <div class="col-xl-12 col-lg-8 col-md-8 col-sm-8 col-12 mx-auto">
                <div class="d-flex justify-content-between">
                    <div class="mb-4">
                        <h2>Datos del Estacionamiento {{$estacionamientomostrar->nombre}}</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="tab-content p-2">
                        <div class="row m-0">
                            <h3 class="text-uppercase fw-bold m-3 text-center">Datos del Estacionamiento</h3>
                            <div class="col-xl-6 col-sm-12 my-2">
                                <img src="{{asset('images/estacionamientos/'.$estacionamientomostrar->foto)}}" class="rounded-3 w-100" alt="{{$estacionamientomostrar->nombre}}">
                            </div>
                            <div class="col-xl-6 col-sm-12 my-2">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Nombre del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->nombre}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Dirrrecion del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->direccion}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Telefono del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->telefono}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Distrito del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->distrito}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5 ">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Referencia del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->referencia}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5 ">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Propietario del Estacionamiento</h6>
                                        <a href="{{route('Usuario.show',$estacionamientomostrar->usuario->usuario_ID)}}" class="mb-0" title="Detalle del Propietario">
                                            {{$estacionamientomostrar->usuario->nombre." ".$estacionamientomostrar->usuario->apellido}}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Capacidad del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->capacidad}} Espacios Disponibles</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Capacidad Actual del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->capacidad_actual}} Espacios Disponibles</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Precio del Estacionamiento</h6>
                                        <p class="mb-0">S./{{$estacionamientomostrar->precio}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Estado del Estacionamiento</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->estado}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Hora de Apertura</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->apertura}}</p>
                                    </div>
                                    <div class="col-xl-6 col-sm-12 mb-5">
                                        <h6 class="text-uppercase fw-bold fs-5 ls-2">Hora de Cierre</h6>
                                        <p class="mb-0">{{$estacionamientomostrar->cierre}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-4">
                            <div class="col-12">
                                <div class="mb-4 text-center">
                                    <h2>Ubicacion del Estacionamiento</h2>
                                </div>
                                <div id="mapa" style="height:500px">

                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{route('Estacionamiento.edit',$estacionamientomostrar->estacionamiento_ID)}}" class="btn btn-info mx-2">Editar</a>
                                <a href="{{route('Estacionamiento.index')}}" class="btn btn-danger mx-2">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
@section('myscript')
    <script>
        $(document).ready(function() {
            let cnd = 'pk.eyJ1IjoibXhjYXQiLCJhIjoiY2t3Y3ZubXBiNGQ4YjJubHR4OWcwenYyeiJ9.emfhV6yYgCju_K58wcRxNA';
            // cordenadas del Estacionamiento
            let l1=@json($estacionamientomostrar->latitud);
            let l2=@json($estacionamientomostrar->longitud);
            // Creacion del mapa y su localizacion del Estacionamiento
            let mymap = L.map('mapa').setView([l1, l2], 15);
            L.tileLayer(`https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=${cnd}`, {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);
            // Ubicacion actual del marcador creado
            let marcadoresta = L.marker([l1, l2],{draggable:false}).addTo(mymap);
            marcadoresta.bindPopup("Estacionamiento: "+@json($estacionamientomostrar->nombre)).openPopup();
        })
    </script>
@endsection
