@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Registro de estacionamiento
@endsection

@section('content')
    <!--BODY-->
    <h2 class="text-center mt-4 mb-3">REGISTRO DE ESTACIONAMIENTO</h2>
    <div class="container">
        <div class="form dobleForm mt-4 mb-4 ">
            <div class="row align-items-stretch">
                <div class="col col-lg-6 col-sm-12 col-12">
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
                                placeholder="alguien@ejemplo.com" oninvalid="alert('Ingrese un correo electrónico válido');" required 
                                pattern="^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                        </div>
                        <div class="mb-3">
                            <label for="telEstacionamiento" class="form-label">Telefono</label>
                            <input type="tel" class="form-control" id="telEstacionamiento" name="telEstacionamiento"
                                placeholder="Ingrese un numero de celular" required pattern="[0-9]{9}" oninvalid="alert('Ingrese un número de celular válido');">
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
                                    <label for="timeppkr" class="form-label">Desde</label>
                                    <input type="text" class="timepicker form-control" id="timepkr" name="horario" placeholder="" required>
                                </div>
                                <div class="col-6">
                                    <label for="timeppkr" class="form-label">Hasta</label>
                                    <input type="text" class="timepicker form-control" id="timepkr" name="horario" placeholder="" required>
                                </div>
                                <div class="timepicker"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-6 col-sm-12 col-12">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="rucEstacionamiento" class="form-label">RUC</label>
                            <input type="text" class="form-control" id="rucEstacionamiento" name="rucEstacionamiento"
                                placeholder="Ingrese el RUC de su empresa" pattern="[0-9]{11}">
                        </div>
                        <div class="mb-3">
                            <label for="refEstacionamiento" class="form-label">Referencia</label>
                            <input type="text" class="form-control" id="refEstacionamiento" name="refEstacionamiento"
                                placeholder="Escriba una referencia" required>
                        </div>
                        <div class="mb-3">
                            <label for="passEstacionamiento" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="passEstacionamiento"
                                name="passEstacionamiento" placeholder="Almenos una mayúscula, una minúscula y un número" oninvalid="alert('Ingrese una contraseña válida');"
                                required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$">
                        </div>
                        <div class="mb-3">
                            <label for="passEstacionamiento" class="form-label">Confirmación de contraseña</label>
                            <input type="password2" class="form-control" id="passEstacionamiento2"
                                name="passEstacionamiento2" placeholder="Vuelva a escribir su contraseña" oninvalid="alert('Ingrese una contraseña válida');"
                                required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$">
                        </div>
                        <div class="mb-3">
                            <label for="fotoEstacionamiento" class="form-label">Mapa del lugar</label><br>
                            <button type="button" class="mapa btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Seleccionar en el mapa</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d116862.54554679655!2d90.40409584970706!3d23.749000170125925!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1550040341458" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="precioEstacionamiento" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precioEstacionamiento"
                                name="precioEstacionamiento" placeholder="En soles" required>
                        </div>
                        <div class="mb-3">
                            <label for="capEstacionamiento" class="form-label ">Capacidad</label>
                            <input type="number" class="form-control" id="capEstacionamiento" name="capEstacionamiento" placeholder="Capacidad de su estacionamiento" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="button-reg">
                    <a href="{{route('registro-estacionamiento-dueño')}}">
                    <button class="btn btn-reg btn-primary rounded-pill" id="btn_login" name="btn_login"
                        type="submit">CONTINUAR</button></a>
                </div>
                <div class="my-3 text-center">
                    <span>¿Ya has creado una cuenta para tu estacionamiento? <a href="{{route('loginAQParking')}}">¡Inicia
                            sesión!</a></span><br>
                    <span><a href="{{route('restore-password')}}">Recuperar Contraseña</a></span>
                </div>
            </div>
            
            <!-- MODAL PARA TYC -->

            <div class="modal fade" id="myModal"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Condiciones del registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        <p>
                            Al aceptar los terminos de registro de cochera,  usted también acepta el uso de determinados servicios vinculados a  AQPARKING y el funcionamiento de la plataforma,
                            los que se gestionan a través de la aplicación y que podrán regirse por condiciones de uso y políticas de privacidad propias.
                        </p>
                        <p>
                            También, acepta el uso de la información registrada, exclusivamente para su verificación de veracidad y legalidad, <b><strong> verificacion que se llevara a cabo en no más de 
                            72 horas a partir de su registro </strong></b>. 
                        </p>
                        <p>
                            Hasta que se confirme la información registrada por su persona, no podrá hacer uso de nuestra web como usuario propietario de una playa de
                            estacionamiento
                        </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="redirect">Cancelar</button>
                            <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FIN MODAL TYC -->
        </div>
    </div>
@endsection