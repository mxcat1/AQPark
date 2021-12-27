@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Pagina de inicio
@endsection

@section('content')
    <!-- BODY -->
    <div class="container mb-5">
        <div class="row">
            @if ($message = Session::get('success'))
                    <div class="alert alert-success my-3">
                        <p>{{ $message }}</p>
                    </div>
            @elseif($message = Session::get('success delete'))
                    <div class="alert alert-danger my-3">
                        <p>{{ $message }}</p>
                    </div>
            @elseif($message = Session::get('Mensaje succes'))
                    <div class="alert alert-danger my-3">
                        <p>{{ $message }}</p>
                    </div>
            @endif
            <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
                <div>
                    <h2 class="mt-5 mt-sm-0">Encuentra estacionamiento en segundos </h2>
                    <p>Ahorra tiempo y dinero</p>
                    <form class="d-flex my-2 my-lg-0 ms-auto">
                        <div class="input-group mb-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                aria-describedby="barrabucaridx">
                            <button class="btn btn-primary" type="submit" id="barrabucaridx">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-6  d-flex justify-content-center">
                <img class="img-fluid" src="img/City_driver.gif" title="imagen de carro" alt="imagen de carro">
            </div>
        </div>
        <h2 class="d-none d-lg-block mt-3">¿Por qué usar nuestro servicio?</h2>
        <div class="row beneficios mt-3 d-flex justify-content-center">
            <div class="col-md-4 d-none d-lg-block benef ">
                <div class="col-lg-6">
                    <img src="img/tiempo.png" alt="" class="img-fluid bene-ico">
                    <p>Ahorra todo ese tiempo que gastas buscando una playa de estacionamiento libre</p>
                </div>
            </div>
            <div class="col-md-4 d-none d-lg-block benef">
                <div class="col-lg-6">
                    <img src="img/gasolina2.png" alt="" class="img-fluid bene-ico">
                    <p>No desperdicies combustible dando vueltas mientras buscas un lugar para estacionar</p>
                </div>
            </div>
            <div class="col-md-4 d-none d-lg-block benef">
                <div class="col-lg-6">
                    <img src="img/clientes.png" alt="" class="img-fluid bene-ico">
                    <p>Consigue nuevos clientes y haz que más gente conozca tu negocio</p>
                </div>
            </div>
        </div>
    </div>
@endsection
