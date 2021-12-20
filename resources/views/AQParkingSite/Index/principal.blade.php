@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Pagina principal
@endsection

@section('content')
    <!-- BODY -->
    <div class="container-fluid my-4 ">
        <div class="row align-items-stretch">
            <div class="col-sm-6">
                <div name="mapa">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.823010982409!2d-77.0388858854909!3d-12.12590987909898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8f8b8d8b8f7%3A0x8f8d8b8d8b8d8b8d!2sParqueo%20AQParking!5e0!3m2!1ses!2spe!4v1580790982796!5m2!1ses!2spe"
                        width="100%" height="100%" class="vh-100" frameborder="0" style="border:0;"
                        allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="text-center mb-3">Playas cerca</h2>
                @foreach($parkingLots as $parking)
                    <div class="card mb-3 mx-auto bg-graycard" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('images/usuarioimg/' . $parking->foto)}}" class="img-fluid rounded-start" alt="img-estacionamiento">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title" id="tituloplaya" name="tituloplaya">{{$parking->nombre}}</h4>
                                            <p class="card-text"><strong>Direccio: </strong><span id="dirplaya"
                                                    name="dirplaya">{{$parking->direccion}}</span>
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
                                            <a href="{{route('reserva-estacionamiento')}}"><button type="button"
                                                    class="btn btn-primary">Reservar</button></a>

                                            <a href="{{route('estacionamientoAQParking',$parking->estacionamiento_ID)}}"><button type="button"
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

