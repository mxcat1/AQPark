@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Reservación de estacionamiento
@endsection

@section('content')
    <!--BODY-->   
    <h2 class="text-center pt-xxl-3 my-5">RESERVA DE ESTACIONAMIENTO</h2>
    <div class="container py-5 my-5">        
        <div class="form-wrapper pb-xxl-5">
            <div class="row">
                <form>
                    <div class="form">
                        <div class="mb-4">
                            <label for="vehiculoRegistrad-sio" class="form-label">Vehículos Registrados</label>
                            <select class="form-select" aria-label="tipoDocumento" id="vehiculoRegistrado" required>
                                <option selected>Selecciona un vehículo</option>
                                <option value="1"> vehículo 01</option>
                                <option value="2"> vehículo 02</option>
                                <option value="3"> vehículo 03</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="marcaVehiculo" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marcaVehiculo" name="marcaVehiculo"
                                placeholder="Hyundai" required>
                        </div>
                        <div class="mb-3">
                            <label for="modeloVehiculo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modeloVehiculo" name="modeloVehiculo"
                                placeholder="Tucson" required>
                        </div>
                        <div class="mb-3">
                            <label for="colorVehiculo" class="form-label">Color</label>
                            <input type="text" class="form-control" id="colorVehiculo" name="colorVehiculo"
                                placeholder="azul" required>
                        </div>
                        <div class="mb-3">
                            <label for="placaVehiculo" class="form-label">Placa vehicular</label>
                            <input type="text" class="form-control" id="placaVehiculo" name="placaVehiculo"
                                placeholder="AFG-717" required>
                        </div>
                        <div class="d-grid ">
                            <button type="submit" class="btn btn-primary">RESERVAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

