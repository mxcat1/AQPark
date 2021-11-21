@extends('AQParkingSite.layouts.headerfooter')

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
          <div class="">
              <div class="card mb-3 mx-auto bg-graycard" style="max-width: 540px;">
                  <div class="row g-0">
                      <div class="col-md-4">
                          <a href="{{url('parking-description')}}"><img src="..."
                                  class="img-fluid rounded-start" alt="..."></a>
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-6">
                                      <h4 class="card-title" id="tituloplaya" name="tituloplaya">Playa prueba</h4>
                                      <p class="card-text"><strong>Direccio: </strong><span id="dirplaya"
                                              name="dirplaya">calle xxxx - 304, JBR</span></p>
                                      <a href="{{url('parking-booking')}}"><button type="button"
                                              class="btn btn-primary">Reservar</button></a>
                                      </p>
                                  </div>
                                  <div class="col-6">
                                      <p class="card-text"><strong>Precio: </strong><span id="priceplaya"
                                              name="priceplaya">$/.5</span></p>
                                      <p class="card-text"><strong>Espacios libres: </strong><span class="border"
                                              id="spaceplaya" name="spaceplaya">15</span></p>
                                      <p class="card-text"><strong>Horario: </strong><span id="timeplaya"
                                              name="timeplaya">9am - 5pm</span></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

