@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Estacionamiento - Crear
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">Estacionamiento - NUEVO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <!-- form -->
        <div class="row mb-6">
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12 mx-auto">
                <div class="d-flex justify-content-between">
                    <div class="mb-4">
                        <h2>Registrar nuevo Estacionamiento</h2>
                    </div>
                </div>
                <div class="card">
                    @include('AQParkingAdmin.partials.vererrores')
                    <div class="tab-content p-4">
                        <form action="{{route('Estacionamiento.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="nombre">Nombre del Estacionamiento</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Indique el Nombre del Estacionamiento">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="telefono">Telefono o Celular del Estacionamiento</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}" placeholder="Indique el Telefono o Celular del Estacionamineto, Telefono fijo con codigo de ciudad">
                            </div>
                            <div class="mb-3">
                                <div class="mb3">
                                    <label class="form-label fw-bold" for="geolocalizacion">Indique un Lugar o distrito, ETC cercano al Estacionamiento Buscado</label>
                                    <div class="my-2 d-flex justify-content-around align-items-center">
                                        <input type="text" class="form-control" id="buscarlugar" placeholder="Indique el Lugar cercano del Estacionamiento">
                                        <button type="button" class="btn btn-primary" id="geolocalizacion">Ubicar Estacionamiento</button>
                                    </div>

                                </div>
                                <div id="mapa" style="height:500px">

                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="distrito">Distrito del Estacionamiento</label>
                                        <input type="text" name="distrito" readonly id="distrito" class="form-control" value="{{old('distrito')}}" placeholder="Distrito">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="longitud">Longitud Geolocalizacion</label>
                                        <input type="text" name="longitud" readonly id="longitud" class="form-control" value="{{old('longitud')}}" placeholder="Longitud">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="latitud">Latitud Geolocalizacion</label>
                                        <input type="text" name="latitud" readonly id="latitud" class="form-control" value="{{old('latitud')}}" placeholder="Latitud">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="direccion">Direccion del Estacionamiento</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Direccion del Estacionamiento">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="referencia">Referencia del Estacionamiento</label>
                                <input type="text" name="referencia" id="referencia" class="form-control" value="{{old('referencia')}}" placeholder="Referencia del Estacionamiento">
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="capacidad">Capacidad del Estacionamiento</label>
                                        <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{old('capacidad')}}" placeholder="Indique la Capacidad" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="apertura">Hora de Apertura del Estacionamiento</label>
                                        <input type="number" name="apertura" id="apertura" class="form-control tiempohorario" value="{{old('apertura')}}" placeholder="Hora de Apertura">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="cierre">Hora de Cierre del Estacionamiento</label>
                                        <input type="number" name="cierre" id="cierre" class="form-control tiempohorario" value="{{old('cierre')}}" placeholder="Hora de Cierre">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="estado">Estado del Estacionamiento</label>
                                <select name="estado" id="estado" class="form-select">
                                    <option value="">Seleccione al Estado del Estacionamiento</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Clausurado">Clausurado</option>
                                    <option value="Sin Servicio">Sin Servicio</option>
                                    <option value="Abierto">Abierto</option>
                                    <option value="Cerrado">Cerrado</option>
                                    <option value="Falta Verificar">Falta Verificar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="precio">Precio por Hora del Estacionamiento</label>
                                <input type="number" name="precio" id="precio" class="form-control" value="{{old('precio')}}" placeholder="Indique la Placa del Vehiculo" step="0.1" min="0" max="100">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="foto">Foto del Estacionamiento</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="propietario">Propietario del Estacionamiento</label>
                                <select name="propietario" id="propietario" class="form-select">
                                    <option value="">Seleccione al Propietario del Estacionamiento</option>
                                    @foreach($listadousuarios as $usuario)
                                        <option value="{{$usuario->usuario_ID}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-2">Crear</button>
                                <a href="{{route('Estacionamiento.index')}}" class="btn btn-danger mx-2">Cancelar</a>
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
    <script>
        $(document).ready(function() {
            let apitoken = 'pk.eyJ1IjoibXhjYXQiLCJhIjoiY2t3Y3ZubXBiNGQ4YjJubHR4OWcwenYyeiJ9.emfhV6yYgCju_K58wcRxNA';
            config = {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            }
            flatpickr(".tiempohorario",config);


            function geoFindMe() {

                if (!navigator.geolocation){
                    alert('ERROR(' + error.code + '): ' + error.message);
                    return;
                }

                function success(position) {
                    let l1=position.coords.latitude;
                    let l2=position.coords.longitude;
                    let mymap = L.map('mapa').setView([l1, l2], 15);
                    // console.log(l2,l1);
                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXhjYXQiLCJhIjoiY2t3Y3ZubXBiNGQ4YjJubHR4OWcwenYyeiJ9.emfhV6yYgCju_K58wcRxNA', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                    }).addTo(mymap);
                    let marcadoresta = L.marker([l1, l2],{draggable:true}).addTo(mymap);
                    marcadoresta.bindPopup("Indica la Ubicacion del Estacionamiento Arrastrando el marcador").openPopup();
                    marcadoresta.on('dragend',function () {
                        // console.log(marcadoresta.getLatLng())
                        $('#longitud').val(marcadoresta.getLatLng().lng);
                        $('#latitud').val(marcadoresta.getLatLng().lat);
                        $.ajax({
                            url:`https://api.mapbox.com/geocoding/v5/mapbox.places/${marcadoresta.getLatLng().lng}%2C%20${marcadoresta.getLatLng().lat}.json?access_token=${apitoken}`,
                            success: function (result) {
                                // console.log(result);
                                // console.log(result.features[1].text);
                                $('#distrito').val(result.features[1].text)
                            },
                            error: function () {
                                alert('Error Lugar no encontrado')
                            }
                        })
                    })
                    $('#geolocalizacion').click(function() {
                        let buscar=$('#buscarlugar').val();
                        $.ajax({
                            url:`https://api.mapbox.com/geocoding/v5/mapbox.places/${buscar}.json?access_token=${apitoken}`,
                            success: function (result) {
                                // console.log(result.features[0].center[0])
                                marcadoresta.setLatLng([result.features[0].center[1],result.features[0].center[0]]);
                                mymap.setView([result.features[0].center[1],result.features[0].center[0]],13)
                            },
                            error: function () {
                                alert('Error Lugar no encontrado')
                            }
                        })
                    });
                }

                function error() {
                    alert('ERROR(' + error.code + '): ' + error.message);
                }

                navigator.geolocation.getCurrentPosition(success, error);
            }
            geoFindMe();
        })
    </script>
@endsection
