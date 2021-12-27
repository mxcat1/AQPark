@extends('AQParkingSite.layouts.headerfooter')

@section('title')
Confirmación de Reservación
@endsection

@section('content')
<!--BODY-->
<div class="container py-5 my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="text-left logo p-2 px-5"> <img class="img-fluid" src="{{asset('img/confirmacion.png')}}"
                        alt="confirmacion"> </div>
                <div class="card-body">
                    <h4 class="card-title">
                        ¡Gracias por tu reserva!</h4>
                    <div class="booking mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Estacionamiento</span>
                                            <span>{{$parking->nombre}}</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Fecha</span> <span> {{ $fecha_actual }} </span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Dirección</span> <span>
                                            {{$parking->direccion}} </span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="{{route('main-pageAQParking')}}" class="card-link">
                        Inicio</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
