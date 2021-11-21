@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Pagina de inicio
@endsection

@section('content')
<!-- BODY -->
<div class="container my-5 py-5">
    <div class="row py-5 my-xxl-2">
        <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center">
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
        <div class="col-12 col-sm-6 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="img/City_driver.gif" title="imagen de carro" alt="imagen de carro">
        </div>
    </div>
</div>
@endsection