@extends('AQParkingAdmin.layouts._layout')

@section('title')
    Usuarios - Crear
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4">
                    <div class="mb-2 mb-lg-0">
                        <h2 class="mb-0 fw-bold">USUARIO - Editar</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <!-- form -->
        <div class="row mb-6">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 mx-auto">
                <div class="d-flex justify-content-between">
                    <div class="mb-4">
                        <h2>Editar Datos del Usuario</h2>
                    </div>
                </div>
                <div class="card">
                    @include('AQParkingAdmin.partials.vererrores')
                    <div class="tab-content p-4">
                        <form action="{{route('Usuario.update',$usuarioedit->usuario_ID)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="nombre">Nombres del Usuario</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuarioedit->nombre}}" placeholder="Indique los Nombres del Usuario para Agregar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="apellido">Apellidos del Usuario</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{$usuarioedit->apellido}}" placeholder="Indique los Apellidos del Usuario para Agregar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="tipo_documento">Tipo de Documento del Usuario</label>
                                <p class="fw-bold">Tipo de Documento Actual: {{$usuarioedit->TipoDocumento->descripcion}}</p>
{{--                                <select name="tipo_documento" id="tipo_documento" class="form-select">--}}
{{--                                    <option value="">Seleccione un Tipo de Documento</option>--}}
{{--                                    @foreach($listadocu as $documento)--}}
{{--                                        <option value="{{$documento->tipo_docu_ID}}">{{$documento->abreviacion}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="documento">Documento del Usuario</label>
                                <p class="fw-bold">{{$usuarioedit->TipoDocumento->abreviacion}}: {{$usuarioedit->documento}}</p>
{{--                                <input type="text" name="documento" id="documento" class="form-control" value="{{$usuarioedit->documento}}" placeholder="Indique el Documento del Usuario para Agregar">--}}
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="email">Correo del Usuario</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$usuarioedit->email}}" placeholder="Indique el Correo del Usuario para Agregar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="telefono">Telefono o Celular del Usuario</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{$usuarioedit->telefono}}" placeholder="Indique el Telefono o Celular del Usuario para Agregar">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="rol">Rol del Usuario</label>
                                <p>Rol Actual del Usuario: {{$usuarioedit->rol}}</p>
                                <select name="rol" id="rol" class="form-select">
                                    <option value="">Seleccione el Rol del Usuario</option>
                                    <option value="Usuario Natural" {{$usuarioedit->rol == 'Usuario Natural' ? 'selected':''}}>Usuario Natural</option>
                                    <option value="Administrador Estacionamiento" {{$usuarioedit->rol == 'Administrador Estacionamiento' ? 'selected':''}}>Administrador Estacionamiento</option>
                                    <option value="Administrador Sistema" {{$usuarioedit->rol == 'Administrador Sistema' ? 'selected':''}}>Administrador Sistema</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" for="foto">Foto del Usuario</label>
                                <p>Foto del Usuario Actual: </p>
                                @if($usuarioedit->foto=="foto-perfil.jpg")
                                    <img src="/images/avatar/{{$usuarioedit->foto}}" class="rounded-circle" alt="foto {{$usuarioedit->nombre}}" width="50px">
                                @else
                                    <img src="/images/usuarioimg/{{$usuarioedit->foto}}" class="rounded-circle" alt="foto {{$usuarioedit->nombre}}" width="50px">
                                @endif
                                <hr>
                                <input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg">
                            </div>
                            <div class="mb-3">
                                <p class="form-label fw-bold" for="password">Cambiar Contraseña del Usuario</p>
                                <a href="{{route('CambiarContraseña',$usuarioedit->usuario_ID)}}" class="btn btn-primary mx-2">Haz Click Para Cambiar la contraseña</a>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-2">Guardar</button>
                                <a href="{{route('Usuario.index')}}" class="btn btn-danger mx-2">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

    </div>
@endsection
