@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Descripción de estacionamiento
@endsection

@section('content')
    <!-- BODY -->

    <div class="container pb-5 my-5">
        <h2 class="text-center pt-3 my-5">{{$parking->nombre}}</h2>
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid" src="{{asset('images/estacionamientos/' . $parking->foto)}}" alt="estacionamiento" width="400" height="600">
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <p class="fw-bold">Dirección: <span class="fw-normal"> {{$parking->direccion}}</span></p>
                    <p class="fw-bold">Referencia: <span class="fw-normal"> {{$parking->referencia}}</span></p>
                    <p class="fw-bold">Horario de atención: <span class="fw-normal">{{$parking->apertura}} a.m. - {{$parking->cierre}} p.m.</span></p>
                </div>
                <div class="row">
                    <h3 class="text-center">Ubicacion del Estacionamiento</h3>
                    <div id="mapa" style="height: 350px">
                    </div>
                </div>
                <div class="row mt-3">
                    <p class="fw-bold">Precio: <span class="fw-normal">S/{{$parking->precio}}</span></p>
                    <p class="fw-bold">Capacidad Total: "<span class="fw-normal">El estacionamiento tiene una capacidad para albergar a {{$parking->capacidad}} coches</span>"</p>
                    <p class="fw-bold">Sitios libres disponibles: "<span class="fw-normal fs-4">{{$parking->capacidad_actual}}</span>"</p>
                </div>
                <a class="btn btn-primary mb-4" href="{{route('reserva-estacionamiento',Crypt::encrypt($parking->estacionamiento_ID))}}" role="button">RESERVAR</a>
                <div id="disqus_thread"></div>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script>
        $(document).ready(function() {
            let cnd = 'pk.eyJ1IjoibXhjYXQiLCJhIjoiY2t3Y3ZubXBiNGQ4YjJubHR4OWcwenYyeiJ9.emfhV6yYgCju_K58wcRxNA';
            // cordenadas del Estacionamiento
            let l1=@json($parking->latitud);
            let l2=@json($parking->longitud);
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
            marcadoresta.bindPopup(@json($parking->nombre)).openPopup();
        })
    </script>
@endsection

