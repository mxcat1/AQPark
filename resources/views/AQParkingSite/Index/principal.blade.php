@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Pagina principal
@endsection

@section('content')
    <!-- BODY -->
    <div class="container-fluid my-4 ">
        <div class="row align-items-stretch">
            <div class="col-sm-6">
                <h2 class="text-center mb-3">Ubicacion de las Playas</h2>
                <div id="mapa" style="height: 700px;">
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="text-center mb-3">Playas cerca</h2>
                @foreach($parkingLots as $parking)
                    <div class="card mb-3 mx-auto bg-graycard" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4 d-none d-md-flex">
                                <img src="{{asset('images/estacionamientos/' . $parking->foto)}}" class="img-fluid" alt="img-estacionamiento">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title" id="tituloplaya" name="tituloplaya">{{$parking->nombre}}</h4>
                                            <p class="card-text"><strong>Direccio: </strong><span id="dirplaya"
                                                    name="dirplaya">{{$parking->direccion}}</span>
                                            </p>
                                            <p class="card-text"><strong>Estado: </strong><span id="dirplaya"
                                                name="dirplaya">{{$parking->estado}}</span>
                                        </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text"><strong>Precio: </strong><span id="priceplaya"
                                                    name="priceplaya">$/.{{$parking->precio}}</span></p>
                                            <p class="card-text"><strong>Espacios libres: </strong><span class="border"
                                                    id="spaceplaya" name="spaceplaya">{{$parking->capacidad_actual}}</span></p>
                                            <p class="card-text"><strong>Horario: </strong><span id="timeplaya"
                                                    name="timeplaya">{{$parking->apertura}} - {{$parking->cierre}}</span></p>
                                        </div>
                                        <div class="col-12">
                                            <a href="{{route('reserva-estacionamiento',Crypt::encrypt($parking->estacionamiento_ID))}}"><button type="button"
                                                    class="btn btn-primary">Reservar</button></a>

                                            <a href="{{route('estacionamientoAQParking',Crypt::encrypt($parking->estacionamiento_ID))}}"><button type="button"
                                                    class="btn btn-success">Ver más</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script>
        $(document).ready(function() {
            let cnd = 'pk.eyJ1IjoibXhjYXQiLCJhIjoiY2t3Y3ZubXBiNGQ4YjJubHR4OWcwenYyeiJ9.emfhV6yYgCju_K58wcRxNA';
            function geoFindMe() {

                if (!navigator.geolocation){
                    alert('ERROR(' + error.code + '): ' + error.message);
                    return;
                }

                function success(position) {
                    let l1=position.coords.latitude;
                    let l2=position.coords.longitude;
                    let mymap = L.map('mapa').setView([l1, l2], 15);
                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibXhjYXQiLCJhIjoiY2t3Y3ZubXBiNGQ4YjJubHR4OWcwenYyeiJ9.emfhV6yYgCju_K58wcRxNA', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                    }).addTo(mymap);
                    @foreach($parkingLots as $parking)
                        L.marker([@json($parking->latitud), @json($parking->longitud)],{draggable:false}).addTo(mymap).bindTooltip(@json($parking->nombre)).openTooltip();;
                    @endforeach
                }

                function error() {
                    alert('ERROR(' + error.code + '): ' + error.message);
                }

                navigator.geolocation.getCurrentPosition(success, error);
                console.log(document.getElementById('mapa'));
            }
            geoFindMe();
        })
    </script>
@endsection

