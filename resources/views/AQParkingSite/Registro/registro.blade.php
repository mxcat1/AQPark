@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Registro
@endsection

@section('content')
    <!-- BODY -->
    <div class="container-fluid bodyreg">
        <h1 class="text-center fw-bold pt-5 fs-x borde">REGISTRATE<br> COMO:</h1>
        <div class="row m-0 justify-content-between vh-100 justify-content-center align-items-center">
            <div class="col-12 col-sm-6 ">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <a href="#"><img src="{{asset('img/usuario.png')}}" class="img-fluid" alt="imagen usuario"
                            title="imagen usuario"></a>
                </div>
            </div>
            <div class="col-12 col-sm-6 ">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <a href="#"><img src="{{asset('img/parking.png')}}" class="img-fluid"
                            alt="imagen parking" title="imagen parking"> </a>
                </div>
            </div>
        </div>
    </div>
@endsection

