@extends('AQParkingSite.layouts.headerfooter')

@section('content')
  <!-- BODY -->

  <div class="container my-5">
    <div class="row ph-100 align-items-center justify-content-center">
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
        <form action="#">
          <div class="mb-4">
            <label for="iptmail" class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" id="iptmailrecover" name="iptmailrecover"
              placeholder="name@example.com" required>
          </div>
          <div class="d-grid ">
            <button class="btn btn-lg btn-primary rounded-pill" id="btn_recover" name="btn_recover"
              type="submit">ENVIAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

