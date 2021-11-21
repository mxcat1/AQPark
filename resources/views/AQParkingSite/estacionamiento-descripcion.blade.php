@extends('AQParkingSite.layouts.headerfooter')

@section('content')
  <!-- BODY -->		
	<h2 class="text-center mt-4 mb-3">NOMBRE DE ESTACIONAMIENTO</h2>
    <div class="container ph-100 my-5">
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
                <button type="button" class="btn btn-primary">Mapa</button>
                <div class="row mt-3">
                    <p>Precio: <span>S/4.00</span></p>
                    <p>Sitios disponibles: <span>7</span></p>
                </div>
                <a class="btn btn-primary" href="{{url('parking-booking')}}" role="button">RESERVAR</a>
                <form action="#">
                    <div class="mb-3 mt-3">
                        <label for="rating">Calificación :</label>
                        <input type="number" id="rating" name="rating" min="1" max="5">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="comment">COMENTARIOS:</label>
                        <textarea class="form-control" rows="4" id="comment" name="text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill">COMENTAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection

