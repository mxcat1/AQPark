@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Cuenta de estacionamiento
@endsection

@section('content')
<!-- BODY -->
<h2 class="text-center my-5">NOMBRE DE ESTACIONAMIENTO</h2>
    <div class="container py-5 my-5">        
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid" src="img/estacionamiento1.jpg" alt="estacionamiento" width="400" height="600">
                <hr class="d-sm-none ">
                <form role="form" class="mb-2">
                    <div class="input-group mb-1 mt-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                    </div>
                    <button type="submit" class="btn btn-primary my-1" id="fotopark" name="fotopark">Subir foto</button>
                </form>
            </div>
            <div class="col-sm-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <p class="fw-bolder fs-6">Dirección:</p>
                        <p id="direccionpark" name="direccionpark">Calle....................</p>
                        <button type="button" class="btn btn-primary my-2" id="modaldirection" name="modaldirection"
                            data-bs-toggle="modal" data-bs-target="#modaldirpark">Actualizar Dirección</button>
                    </div>
                    <div class="col-sm-6">
                        <p class="fw-bolder fs-6">Horario de atención:</p>
                        <p>De: <span id="atencioninicio" name="atencioninicio">6:00 </span> Hasta: <span
                                id="atencionfin" name="atencionfin">22:00</span></p>
                        <button type="button" class="btn btn-primary my-2" id="modalhora" name="modalhora"
                            data-bs-toggle="modal" data-bs-target="#modaltime">Actualizar Horario</button>
                    </div>
                    <div class="col-sm-6">
                        <p class="fw-bolder fs-6">Precio:</p>
                        <p>Hora o fracción: S/.<span id="precioparking" name="precioparking">6:00 </span></p>
                        <button type="button" class="btn btn-primary my-2" id="btn-modalprecio" name="btn-modalprecio"
                            data-bs-toggle="modal" data-bs-target="#modalprices">Actualizar
                            Precio</button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <p class="fw-bolder fs-6">Espacios Disponibles:</p>
                        <h2 class="mx-5">n</h2>
                        <hr class="d-sm-none ">
                        <form role="form" class="mb-2 mx-auto">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary my-2" id="btn-sitioplus"
                                    name="btn-sitioplus"><i data-feather="plus"></i></button>
                                <button type="submit" class="btn btn-danger my-2" id="btn-sitiominus"
                                    name="btn-sitiominus"><i data-feather="minus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MODALES -->
    <div class="modal fade" id="modaldirpark" tabindex="-1" aria-labelledby="modaldirection" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaldirection">Cambio de Dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" class="mb-2">
                        <div class="form-group">
                            <label for="routepark" class="fw-bolder fs-6">Ubicación: </label>
                            <div class="input-group">
                                <span class="input-group-text">Dirección</span>
                                <input name="routepark" id="routepark" type="text" required class="form-control"
                                    placeholder="Direccion">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-3" id="btm-routeupdate"
                            name="btn-routeupdate">Actualizar Dirección</button>
                        <button type="reset" class="btn btn-danger my-3" id="btm-clearroute"
                            name="btn-clearroute">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modaltime" tabindex="-1" aria-labelledby="modalhorario" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalhorario">Cambio de Horario de atención</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" class="mb-2">
                        <div class="form-group">
                            <label for="" class="fw-bolder fs-6">Horario de atención: </label>
                            <div class="input-group">
                                <span class="input-group-text">De: </span>
                                <input name="horainicio" id="horainicio" type="time" required class="form-control"
                                    placeholder="Sucursal">
                                <span class="input-group-addon"> --</span>
                                <span class="input-group-text">Hasta: </span>
                                <input name="mininicio" id="mininicio" type="time" required class="form-control"
                                    placeholder="Numero">
                            </div>
                            <button type="submit" class="btn btn-primary my-3" id="btn-horaupdate"
                                name="btn-horaupdate">Actualizar Horario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalprices" tabindex="-1" aria-labelledby="modalcosto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalcosto">Cambio de Precio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" class="mb-2">
                        <div class="form-group">
                            <label for="" class="fw-bolder fs-6">Precio: </label>
                            <div class="input-group ">
                                <span class="input-group-text">S/.</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                                    name="pricepark" id="pricepark">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-3" id="btn-priceupdate"
                            name="btn-priceupdate">Actualizar Precio</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection