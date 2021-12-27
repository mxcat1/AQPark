@extends('AQParkingSite.layouts.headerfooter')

@section('title')
    Cuenta de usuario
@endsection

@section('content')
    <!-- BODY -->
    <h2 class="text-center my-5">Mi Cuenta</h2>
    <div class="container mb-5 pb-5">
        <div class="row align-items-stretch">
            @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @elseif($message = Session::get('success delete'))
                    <div class="alert alert-danger my-3">
                        <p>{{ $message }}</p>
                    </div>
            @endif
            @include('AQParkingSite.Mensajes.error')
            <div class="col-sm-6 mb-2">
                <div name="datos_login" class="text-center border border-1 p-2 mb-2">
                    <h3>Datos del login</h3>
                    <p><strong>Correo: </strong><span id="usrlogmail" name="usrlogmail">{{ Auth::user()->email }}</span></p>
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
                                <form action="
                                {{route('updatepassword',Auth::user()->usuario_ID)}}
                                " method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-bold">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Ingrese nueva contraseña" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label fw-bold">Repita contraseña</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repita nueva contraseña" required>
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

                <div name="datos_usuario" class="text-center border border-1 p-2 d-flex justify-content-center flex-column">
                    <h3>Datos del usuario</h3>
                    <img src="{{asset('images/usuarioimg/' . Auth::user()->foto)}}" alt="user" class="img-fluid rounded-circle mx-auto my-3" width="100">
                    <p><strong>Usuario: </strong><span id="usrname" name="usrname">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span></p>

                    <p><strong>Correo de destino: </strong><span id="usrcorreo"
                            name="usrcorreo">{{ Auth::user()->email }}</span></p>
                    @if(Auth::user()->email_verified_at)
                        <p>
                            <strong>Correo Verificado </strong>
                        </p>
                    @else
                        <p>
                            <strong>Correo no Verificado </strong>
                        </p>

                    @endif

                    <p><strong>Celular: </strong><span id="usrcel" name="usrcel">{{ Auth::user()->telefono }}</span></p>

                    <div class="d-flex justify-content-around">
                        <button type="button" class="btn btn-primary" id="btn-changedata" name="btn-changedata"
                                data-bs-toggle="modal" data-bs-target="#modaldatausr">Editar
                            datos</button>
                        @if(!Auth::user()->email_verified_at)
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <button type="submit" class="btn btn-primary" >Verificar Correo</button>
                                </div>
                            </form>
                        @endif
                    </div>

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
                                <form action="{{route('updateusuario', Auth::user()->usuario_ID)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="foto" class="form-label fw-bold">Perfil del Usuario</label>
                                        <br>
                                        <img src="{{asset('images/usuarioimg/' . Auth::user()->foto)}}" alt="user" class="img-fluid rounded-circle mx-auto my-3" width="100">
                                        <input type="file" class="my-3 mx-auto" id="foto" name="foto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->nombre }}"
                                            placeholder="Ingrese su nombre" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellido" class="form-label fw-bold">Apellidos </label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->apellido }}" id="apellido" name="apellido"
                                            placeholder="Ingrese su apellido paterno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono" class="form-label fw-bold">Celular</label>
                                        <input type="number" class="form-control" value="{{ Auth::user()->telefono }}" id="telefono" name="telefono"
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
                @if(count($usuarioselec->Vehiculos))
                        <div class="my-2 border border-1 p-2">
                            <h4 class="card-title my-4 text-center">Vehiculos en Propiedad</h4>
                            <div class="col-12 mb-5">
                                @foreach($usuarioselec->Vehiculos as $vehiculo)
                                    <li class="mb-0 d-flex flex-row justify-content-around align-items-center">
                                        Modelo: {{$vehiculo->modelo}} &nbsp | &nbsp Placa: {{$vehiculo->placa}}
                                        <div class="my-1">
                                            <form action="{{ route('borrar_vehiculo',$vehiculo->vehiculo_ID) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Esta seguro de eliminar este Elemento?');" class="btn btn-danger delete" >
                                                    <i data-feather="trash" class="icon-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <h4 class="card-title my-4">No es Propietario de Ningun Vehiculo</h4>
                    @endif
                    <div name="nuevo_vehiculo" class="text-center border border-1 p-2 mb-2">
                        <button type="button" class="btn btn-primary" id="btn-changepass" name="btn-changepass"
                            data-bs-toggle="modal" data-bs-target="#modalvehiculo">Agregar nuevo Vehículo</button>
                    </div>
                    <div class="modal fade" id="modalvehiculo" tabindex="-1" aria-labelledby="modalcontraseña"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalcontraseña">Nuevo Vehículo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('registro-auto')}}" method="post">
                                        @csrf
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
                                                <input type="text" class="form-control" id="placa" name="placa"
                                                    placeholder="XXX-123" required>
                                            </div>
                                            <div class="d-grid ">
                                                <button type="submit" class="btn btn-primary">REGISTRAR</button>
                                            </div>
            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6">
                <h2 class="text-center my-2">Historial de reservas</h2>
                <form>
                    <div class="row">
                        <div class="col-6 col-sm-4 mb-3">
                            <select class="form-select" name="mes" id="mes" aria-label="reservas realizadas">
                                <option value="">Mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
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
                            <input type="number" class="form-control" id="año" name="año" min="2020" placeholder="Año">
                        </div>
                        <div class="col-6 col-sm-4">
                            <select class="form-select" id="buscarparking" name="buscarparking" aria-label="reservas realizadas">
                                <option value="">Seleccione un Estacionamiento</option>
                                @foreach($estacionamientos as $estacionamiento)
                                    <option value="{{encrypt($estacionamiento->estacionamiento_ID)}}">{{$estacionamiento->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 col-sm-12 mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
                <h3 class="mb-2" id="text-reserva" name="text-reserva">Ultimas Reservas</h3>
                @foreach($reservas as $reserva)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$reserva->Estacionamiento->nombre}}</h5>
                            <p class="card-text">Fecha: <span id="fechapark" name="fechapark">{{$reserva->fecha}}</span></p>
                            <p class="card-text">Hora: <span id="horapark" name="horapark">{{$reserva->ingreso}} - {{$reserva->salida}}</span></p>
                        </div>
                    </div>
                @endforeach
                {{ $reservas->links() }}
            </div>
        </div>
    </div>
@endsection
