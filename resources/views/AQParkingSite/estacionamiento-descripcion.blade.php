@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Descripción de estacionamiento
@endsection

@section('content')
  <!-- BODY -->		
  <h2 class="text-center pt-3 my-5">NOMBRE DE ESTACIONAMIENTO</h2>
  <div class="container py-5 my-5">        
      <div class="row">
          <div class="col-sm-4">
              <img class="img-fluid" src="img/estacionamiento1.jpg" alt="estacionamiento" width="400" height="600">
              <hr class="d-sm-none">
          </div>
          <div class="col-sm-8">
              <div class="row">
                  <p>Dirección: <span> </span></p>
                  <p>Horario de atención: <span>4:00 a.m. - 10:00 p.m.</span></p>
              </div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Mapa</button>
              <div class="row mt-3">
                  <p>Precio: <span>S/4.00</span></p>
                  <p>Sitios disponibles: <span>7</span></p>
              </div>
              <a class="btn btn-primary mb-4" href="{{ route('Parking-booking') }}" role="button">RESERVAR</a>
              <div id="disqus_thread"></div>
          </div>
      </div>
  </div>
@endsection

