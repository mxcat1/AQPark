@extends('AQParkingSite.layouts.headerfooter')

@section('content')
<!--BODY-->
<h2 class="text-center mt-4 mb-3">REGISTRO DE ESTACIONAMIENTO</h2>

<div class="container dobleForm w-100 mt-4 mb-4 ">
    <div class="row align-items-stretch">
        <div class="col col-lg-6 col-sm-12 col-12">
            <form>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="nomEstacionamiento" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nomEstacionamiento" name="nomEstacionamiento"
                            placeholder="Nombre del estacionamiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="dirEstacionamiento" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="dirEstacionamiento" name="dirEstacionamiento"
                            placeholder="Dirección del estacionamiento" required>
                    </div>
                    <div class="mb-3">
                        <label for="mailEstacionamiento" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="mailEstacionamiento" name="mailEstacionamiento"
                            placeholder="alguien@ejemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="telEstacionamiento" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="telEstacionamiento" name="telEstacionamiento"
                            placeholder="Ingrese un numero de celular" required>
                    </div>
                    <div class="mb-3">
                        <label for="fotoEstacionamiento" class="form-label">Foto</label>
                        <input type="file" ccept="image/jpg, image/jpeg, image/png" class="form-control"
                            id="fotoEstacionamiento" name="fotoEstacionamiento" required>
                    </div>
                    <div class="timepicker mb-3">
                        <div class="row time">
                            <label for="horario" class="form-label">Horarios</label>
                            <div class="col-6">
                                <input type="text" class="timepicker form-control" id="timepkr" name="horario"
                                    placeholder="Desde" required>
                            </div>
                            <div class="col-6">
                                <input type="text" class="timepicker form-control" id="timepkr" name="horario"
                                    placeholder="Hasta" required>
                            </div>
                            <div class="timepicker"></div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="col col-lg-6 col-sm-12 col-12">
            <form>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="rucEstacionamiento" class="form-label">RUC</label>
                        <input type="number" class="form-control" id="rucEstacionamiento" name="rucEstacionamiento"
                            placeholder="Ingrese el RUC de su empresa" required min="11" max="11">
                    </div>
                    <div class="mb-3">
                        <label for="refEstacionamiento" class="form-label">Referencia</label>
                        <input type="text" class="form-control" id="refEstacionamiento" name="refEstacionamiento"
                            placeholder="Escriba una referencia" required>
                    </div>
                    <div class="mb-3">
                        <label for="passEstacionamiento" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="passEstacionamiento"
                            name="passEstacionamiento" placeholder="***************" required>
                    </div>
                    <div class="mb-3">
                        <label for="fotoEstacionamiento" class="form-label">Mapa del lugar</label><br>
                        <button type="button" class="mapa btn btn-secondary btn-sm"><a
                                href="https://goo.gl/maps/hCEoTeUvduzVQcV27"></a>Seleccionar en el mapa</button>
                    </div>
                    <div class="mb-3">
                        <label for="precioEstacionamiento" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" id="precioEstacionamiento"
                            name="precioEstacionamiento" placeholder="En soles" required>
                    </div>
                    <div class="mb-3">
                        <label for="capEstacionamiento" class="form-label">Capacidad</label>
                        <input type="number" class="form-control" id="capEstacionamiento" name="capEstacionamiento"
                            placeholder="Capacidad de su estacionamiento" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="button-reg">
            <button class="btn btn-reg btn-primary rounded-pill" id="btn_login" name="btn_login"
                type="submit">REGISTRARSE</button>
        </div>
        <div class="my-3 text-center">
            <span>¿Ya has creado una cuenta para tu estacionamiento? <a href="registro.html">¡Inicia
                    sesión!</a></span><br>
            <span><a href="recuperacion.html">Recuperar Contraseña</a></span>
        </div>
    </div>
</div>
@endsection

