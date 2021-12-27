<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon/favicon.ico')}}">

    <!-- Libs CSS -->

    <link rel="stylesheet" href="{{asset('libs/prismjs/themes/prism.css')}}">
    <link rel="stylesheet" href="{{asset('libs/prismjs/plugins/line-numbers/prism-line-numbers.css')}}">
    <link rel="stylesheet" href="{{asset('libs/prismjs/plugins/toolbar/prism-toolbar.css')}}">
    <link rel="stylesheet" href="{{asset('libs/bootstrap-icons/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('libs/dropzone/dist/dropzone.css')}}">
{{--    <link rel="stylesheet" href="{{asset('libs/leafletjs/leaflet.css')}}">--}}
{{--    Libreria Leaflet.js --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>


    <link href="{{asset('libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
    <!-- flatpickr css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('css/theme.min.css')}}">
    <title>Adminsitracion Sistema AQParking - @yield('title')</title>
</head>

<body>
<div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    <nav class="navbar-vertical navbar">
        <div class="nav-scroller">
            <!-- Brand logo -->
            <a class="navbar-brand" href="../index.html">
{{--                <img src="{{asset('images/brand/logo/logo.svg')}}" alt="" />--}}
                <span style="font-size: 30px">AQParking</span>
            </a>
            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <li class="nav-item">
                    <a class="nav-link has-arrow " href="{{route('inicio')}}">
                        <i data-feather="home" class="nav-icon icon-xs me-2"></i> Inicio
                    </a>

                </li>


                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Control de Usuarios</div>
                </li>


                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                       data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                        <i data-feather="users" class="nav-icon icon-xs me-2">
                        </i> Usuarios
                    </a>

                    <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Usuario.index')}}">
                                    Listado de Usuarios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link has-arrow   " href="{{route('Usuario.create')}}">
                                    Crear Nuevo Usuario
                                </a>

                            </li>


                        </ul>
                    </div>

                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                       data-bs-target="#navvehiculos" aria-expanded="false" aria-controls="navComponents">
                        <i data-feather="truck" class="nav-icon icon-xs me-2">
                        </i> Vehiculos
                    </a>
                    <div id="navvehiculos" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Vehiculo.index')}}" aria-expanded="false">
                                    Listar Vehiculos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Vehiculo.create')}}" aria-expanded="false">
                                    Agregar Nuevo Vehiculo
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                       data-bs-target="#navComponents" aria-expanded="false" aria-controls="navComponents">
                        <i data-feather="layers" class="nav-icon icon-xs me-2">
                        </i> Tipo de Documentos
                    </a>
                    <div id="navComponents" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('TipoDocumento.index')}}" aria-expanded="false">
                                    Listar Tipo de Documentos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('TipoDocumento.create')}}" aria-expanded="false">
                                    Crear Tipo de Documento
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Control de Estacionamientos</div>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                       data-bs-target="#navestacionamiento" aria-expanded="false" aria-controls="navComponents">
                        <i data-feather="flag" class="nav-icon icon-xs me-2">
                        </i> Estacionamientos
                    </a>
                    <div id="navestacionamiento" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Estacionamiento.index')}}" aria-expanded="false">
                                    Listar Estacionamientos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Estacionamiento.create')}}" aria-expanded="false">
                                    Crear Estacionamiento
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse"
                       data-bs-target="#navreservas" aria-expanded="false" aria-controls="navComponents">
                        <i data-feather="database" class="nav-icon icon-xs me-2">
                        </i> Reservas
                    </a>
                    <div id="navreservas" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Reserva.index')}}" aria-expanded="false">
                                    Listar Reservas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('Reserva.create')}}" aria-expanded="false">
                                    Crear Nueva Reservas
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>

        </div>
    </nav>
    <!-- page content -->
    <div id="page-content">
        <div class="header @@classList">
            <!-- navbar -->
            <nav class="navbar-classic navbar navbar-expand-lg">
                <a id="nav-toggle" href="#">
                    <i data-feather="menu" class="nav-icon me-2 icon-xs"></i>
                </a>
                <!--Navbar nav -->
                <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">

                    <!--#region Notificaiones -->
{{--                    <li class="dropdown stopevent">--}}
{{--                        <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary text-muted"--}}
{{--                           href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown"--}}
{{--                           aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="icon-xs" data-feather="bell"></i>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="dropdownNotification">--}}
{{--                            <div>--}}
{{--                                <div class="border-bottom px-3 pt-2 pb-3 d-flex justify-content-between align-items-center">--}}
{{--                                    <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>--}}
{{--                                    <a href="#" class="text-muted">--}}
{{--                                            <span>--}}
{{--                                                <i class="me-1 icon-xxs" data-feather="settings"></i>--}}
{{--                                            </span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <!-- List group -->--}}
{{--                                <ul class="list-group list-group-flush notification-list-scroll">--}}
{{--                                    <!-- List group item -->--}}
{{--                                    <li class="list-group-item bg-light">--}}


{{--                                        <a href="#" class="text-muted">--}}
{{--                                            <h5 class="fw-bold mb-1">Rishi Chopra</h5>--}}
{{--                                            <p class="mb-0">--}}
{{--                                                Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.--}}
{{--                                            </p>--}}
{{--                                        </a>--}}


{{--                                    </li>--}}
{{--                                    <!-- List group item -->--}}
{{--                                    <li class="list-group-item">--}}


{{--                                        <a href="#" class="text-muted">--}}
{{--                                            <h5 class="fw-bold mb-1">Neha Kannned</h5>--}}
{{--                                            <p class="mb-0">--}}
{{--                                                Proin at elit vel est condimentum elementum id in ante. Maecenas et--}}
{{--                                                sapien metus.--}}
{{--                                            </p>--}}
{{--                                        </a>--}}


{{--                                    </li>--}}
{{--                                    <!-- List group item -->--}}
{{--                                    <li class="list-group-item">--}}


{{--                                        <a href="#" class="text-muted">--}}
{{--                                            <h5 class="fw-bold mb-1">Nirmala Chauhan</h5>--}}
{{--                                            <p class="mb-0">--}}
{{--                                                Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit--}}
{{--                                                vel pretium.--}}
{{--                                            </p>--}}
{{--                                        </a>--}}


{{--                                    </li>--}}
{{--                                    <!-- List group item -->--}}
{{--                                    <li class="list-group-item">--}}


{{--                                        <a href="#" class="text-muted">--}}
{{--                                            <h5 class="fw-bold mb-1">Sina Ray</h5>--}}
{{--                                            <p class="mb-0">--}}
{{--                                                Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu--}}
{{--                                                diam.--}}
{{--                                            </p>--}}
{{--                                        </a>--}}


{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="border-top px-3 py-2 text-center">--}}
{{--                                    <a href="#" class="text-inherit fw-semi-bold">--}}
{{--                                        View all Notifications--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    <!--#endregion  -->

                    <!-- List -->
                    <li class="dropdown ms-2">
                        <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                @if(Auth::user()->foto!='foto-perfil.jpg')
                                    <img alt="avatar" src="{{asset('images/usuarioimg/' . Auth::user()->foto)}}" class="rounded-circle" />
                                @else
                                    <img alt="avatar" src="{{asset('images/avatar/' . Auth::user()->foto)}}" class="rounded-circle" />
                                @endif
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="px-4 pb-0 pt-2">


                                <div class="lh-1 ">
                                    <h5 class="mb-1"> @auth {{ Auth::user()->nombre }}({{Auth::user()->rol}}) @else Invitado @endauth</h5>
                                    <a href="#" class="text-inherit fs-6">View my profile</a>
                                </div>
                                <div class=" dropdown-divider mt-3 mb-2"></div>
                            </div>

                            <ul class="list-unstyled">

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>Edit
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('LoginDesautenticacion') }}" class="dropdown-item">
                                        @csrf
                                        <a href="{{route('LoginDesautenticacion')}}" role="button" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Cerrar Sessión
                                        </a>
                                    </form>
                                </li>
                            </ul>

                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Container fluid -->
        <div class="container-fluid px-6 py-4">
            @yield('content')
        </div>

    </div>
</div>
<!-- Scripts -->
<!-- Libs JS -->
<script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('libs/selectize/standalone/selectize.js')}}"></script>
<link rel="stylesheet" href="{{asset('libs/selectize/css/selectize.bootstrap5.css')}}">
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('libs/feather-icons/dist/feather.min.js')}}"></script>
<script src="{{asset('libs/prismjs/components/prism-core.min.js')}}"></script>
<script src="{{asset('libs/prismjs/components/prism-markup.min.js')}}"></script>
<script src="{{asset('libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js')}}"></script>
<script src="{{asset('libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('libs/dropzone/dist/min/dropzone.min.js')}}"></script>

{{--<script src="{{asset('libs/selectize/selectize.js')}}"></script>--}}
{{--<script src="{{asset('libs/leafletjs/leaflet.js')}}"></script>--}}


<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<!-- Theme JS -->
<script src="{{asset('js/theme.min.js')}}"></script>

@yield('myscript')

</body>

</html>
