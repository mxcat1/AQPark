@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Cuenta de usuario
@endsection

@section('content')
    <!-- BODY -->
    <h2 class="text-center my-5">Mi Cuenta</h2>
    <div class="container my-5 py-5">        
        <div class="row align-items-stretch">
            <div class="col-sm-6 mb-2">
                <div name="datos_login" class="text-center border border-1 p-2 mb-2">
                    <h3>Datos del login</h3>
                    <p><strong>Correo: </strong><span id="usrlogmail" name="usrlogmail">correo@gmail.com</span></p>
                    <p><strong>Contraseña: </strong><span id="usrlogpass" name="usrlogpass">xxxxx</span></p>
                    <button type="button" class="btn btn-primary" id="btn-changepass" name="btn-changepass"
                        data-bs-toggle="modal" data-bs-target="#modalpassusr">Cambiar
                        contraseña</button>
                </div>
                <div class="modal fade" id="modalpassusr" tabindex="-1" aria-labelledby="modalcontraseña"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalcontraseña">Cambio de Contraseña</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="newusrlogpass1" class="form-label fw-bold">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="newusrlogpass1"
                                            placeholder="Ingrese nueva contraseña" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newusrlogpass2" class="form-label fw-bold">Repita contraseña</label>
                                        <input type="password" class="form-control" id="newusrlogpass2"
                                            placeholder="Repita nueva contraseña" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btn-savepass"
                                        name="btn-savepass">Guardar</button>
                                    <button type="reset" class="btn btn-danger" id="btn-cancelpass"
                                        name="btn-cancelpass">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div name="datos_usuario" class="text-center border border-1 p-2">
                    <h3>Datos del usuario</h3>
                    <img src="img/usuario.png" alt="user" class="img-fluid rounded-circle mx-auto my-3" width="100">

                    <p><strong>Usuario: </strong><span id="usrname" name="usrname">nombre apellido</span></p>

                    <p><strong>Correo de destino: </strong><span id="usrcorreo"
                            name="usrcorreo">correo-destino@gmail.com</span></p>

                    <p><strong>Celular: </strong><span id="usrcel" name="usrcel">123456789</span></p>

                    <button type="button" class="btn btn-primary" id="btn-changedata" name="btn-changedata"
                        data-bs-toggle="modal" data-bs-target="#modaldatausr">Editar
                        datos</button>
                </div>
                <div class="modal left fade" id="modaldatausr" tabindex="-1" aria-labelledby="modaldata"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modaldata">Cambio de datos del Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="fotousr" class="form-label fw-bold">Perfil del Usuario</label>
                                        <br>
                                        <input type="file" class="my-3 mx-auto" id="fotousr" name="fotousr" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nameusrac" class="form-label fw-bold">Nombre</label>
                                        <input type="text" class="form-control" id="nameusr" name="nameusr"
                                            placeholder="Ingrese su nombre" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ape1usrac" class="form-label fw-bold">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="ape1usrac" name="ape1usrac"
                                            placeholder="Ingrese su apellido paterno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ape2usrac" class="form-label fw-bold">Apellido Materno</label>
                                        <input type="text" class="form-control" id="ape2usrac" name="ape2usrac"
                                            placeholder="Ingrese su apellido materno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mailusrac" class="form-label fw-bold">Correo de destino
                                            preferido</label>
                                        <input type="email" class="form-control" id="mailusrac" name="mailusrac"
                                            placeholder="Ingrese un correo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="celusrac" class="form-label fw-bold">Celular</label>
                                        <input type="number" class="form-control" id="celusrac" name="celusrac"
                                            placeholder="Ingrese su número" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btn-savedata"
                                        name="btn-savedata">Guardar</button>
                                    <button type="reset" class="btn btn-danger" id="btn-canceldata"
                                        name="btn-canceldata">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="text-center my-2">Historial de reservas</h2>
                <div class="row">
                    <div class="col-6 col-sm-4 mb-3">
                        <select class="form-select" aria-label="reservas realizadas">
                            <option selected>Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febreo</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-6 col-sm-4">
                        <input type="number" class="form-control" id="year" name="year" min="2021" placeholder="Año">
                    </div>
                    <div class="col-6 col-sm-4">
                        <select class="form-select" aria-label="reservas realizadas">
                            <option selected>Estacionamiento</option>
                            <option value="1">ParkingPepito</option>
                            <option value="2">VeraParking</option>
                            <option value="3">CocherasVilca</option>
                            <option value="3">PlazaZafiro</option>
                        </select>
                    </div>
                    <div class="col-6 col-sm-12 mb-3 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" id="btn-filtroreserva"
                            name="btn-filtroreserva">Filtrar</button>
                    </div>
                </div>
                <h3 class="mb-2" id="text-reserva" name="text-reserva">Ultimas Reservas</h3>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ParkingPepito</h5>
                        <p class="card-text">Fecha: <span id="fechapark" name="fechapark">15/03/2021</span></p>
                        <p class="card-text">Hora: <span id="horapark" name="horapark">12:00 - 13:00</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection