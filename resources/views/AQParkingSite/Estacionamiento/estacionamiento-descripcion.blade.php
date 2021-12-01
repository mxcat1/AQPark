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
                <p class="fw-bold">Dirección: <span class="fw-normal"> Calle nombre</span></p>
                <p class="fw-bold">Horario de atención: <span class="fw-normal">4:00 a.m. - 10:00 p.m.</span></p>
              </div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Mapa</button>
              <div class="row mt-3">
                <p class="fw-bold">Precio: <span class="fw-normal">S/4.00</span></p>
                <p class="fw-bold">Sitios disponibles: "<span class="fw-normal fs-4">7</span>"</p>
              </div>
              <a class="btn btn-primary mb-4" href="{{ route('parking-booking') }}" role="button">RESERVAR</a>
              <div id="disqus_thread"></div>
          </div>
      </div>
  </div>
  <!-- MODAL MAPA-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estacionamiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div name="mapa">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.823010982409!2d-77.0388858854909!3d-12.12590987909898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8f8b8d8b8f7%3A0x8f8d8b8d8b8d8b8d!2sParqueo%20AQParking!5e0!3m2!1ses!2spe!4v1580790982796!5m2!1ses!2spe"
                        width="100%" height="100%" class="vh-100" frameborder="0" style="border:0;"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

