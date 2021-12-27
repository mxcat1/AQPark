@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Recuperación de contraseña
@endsection

@section('content')
  <!-- BODY -->
  <div class="container py-5 my-5">
    <div class="row align-items-center justify-content-center">
      <div class="col-sm-6">
        <h1 class="text-center">RECUPERACIÓN DE CONTRASEÑA</h1>
        <p class="text-justify">Ingresa tu correo con el que te registraste y te enviaremos tu actual contraseña he
          indicaciones para que la puedas cambiar.</p>
        <div class="my-3">
          <span>Gracias por contactarnos</span>
        </div>
      </div>
      <div class="col-sm-6">
        <h2 class="fw-bold text-center py-5">Ingresa tu correo <i data-feather="arrow-down"></i></h2>
        <form method="post" action="{{route('RecuperarPassword')}}">
        @csrf
          <div class="mb-4">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email"
              placeholder="name@example.com" required>
          </div>
          <div class="d-grid ">
            <button class="btn btn-lg btn-primary rounded-pill" id="btn_recover" name="btn_recover"
              type="submit">ENVIAR</button>
          </div>
        </form>
      </div>
      <div class="col-12 d-flex justify-content-center mt-5 ">
        <img src="img/logo.png" title="logo AQPparking" alt="logo AQPparking" class="img-fluid mt-5 d-none  d-xxl-block">
      </div>
    </div>
  </div>
@endsection

