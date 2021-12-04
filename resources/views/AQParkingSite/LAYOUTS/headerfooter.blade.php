<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="estacionamientos en Arequipa, Parqueos en Arequipa, Arequipa parking, playas de estacionamiento, reserva de estacionamiento">
    <meta name="description"
        content="Encuentra tu estacionamiento en la ciudad de Arequipa y reserva tu sitio facilmente">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <!--flatpickr time picker CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>AQParking - @yield('title')</title>
</head>

<body>
    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-light bg-sky">
        <div class="container-fluid">
            <a href="
            @if(Auth::check())
            {{route('main-pageAQParking')}}
            @else
            {{route('indexAQParking')}}
            @endif
            " class="text-decoration-none" title="Link to INDEX">
                <img src="{{asset('img/logo.png')}}" title="logo AQPparking" alt="logo AQPparking"
                    class="img-fluid ms-2" style="width: 7em;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <form class="d-flex my-2 my-lg-0 ms-auto">
                    <div class="input-group mb-3 my-sm-3">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            aria-describedby="barrabuscarheader">
                        <button class="btn btn-primary" type="submit" id="barrabuscarheader"><i
                                data-feather="search"></i></button>
                    </div>
                </form>
                @if(Auth::check())
                <ul class="navbar-nav ms-auto">
                    <li>
                        <div class="dropdown mx-4">
                            <a class="dropdown-toggle text-uppercase" type="button" id="dropdownMenuUser"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->nombre }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuUser">
                                <li>
                                    <a class="dropdown-item" href="{{route('cuenta-usuarioAQParking')}}">Mi cuenta
                                    </a>
                                </li>
                                @if(Auth::user()->rol == 'Administrador Estacionamiento')
                                <li class="nav-item">
                                    <a class="dropdown-item"
                                        href="{{route('cuenta-estacionamientoAQParking')}}">Estacionamiento
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <form method="POST" action="{{route('logout')}}" class="dropdown-item">
                                        @csrf
                                        <a href="{{route('logout')}}" role="button"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Cerrar
                                            Sessión
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mb-2 mb-lg-0">
                        <a href="{{route('registroAQParking')}}">
                            <button type="submit" class="btn btn-secondary mx-3" id="btn_registro"
                                name="btn_registro">Registrarse</button>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('loginAQParking')}}">
                            <button type="button" class="btn btn-primary mx-2" id="btn_sesion" name="btn_sesion">Iniciar
                                Sesión</button>
                        </a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
    <!-- BODY -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="col col-lg-12 my-4">
                        <img src="{{asset('img/logo.png')}}" title="logo AQPparking" alt="logo AQPparking">
                        <a class="text-light display-6 px-4 " href="#" target="_blank" alt="icono instagram"
                            title="Link to Instsgram"><i data-feather="instagram"></i></a>
                        <a class="text-light display-6 px-4" href="#" target="_blank" alt="icono twitter"
                            title="Link to Twitter"><i data-feather="twitter"></i></a>
                        <a class="text-light display-6 px-4" href="#" target="_blank" alt="icono facebook"
                            title="Link to Facebook"><i data-feather="facebook"></i></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row tyc">
                        <div class=" col-lg-4">
                            <a href="{{route('terminosAQParking')}}" title="Link Terminos y condiciones">Terminos y
                                condiciones</a>
                        </div>
                        <div class="col-lg-4 c2">
                            <a href="{{route('privacidadAQParking')}}" title="Link Política de privacidad">Política de
                                privacidad</a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="{{route('cookiesAQParking')}}" title="Política de Cookies">Política de Cookies</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row end ">
                <p class="text-center mt-3">© <span id="anio"></span> AQParking.com by Nosotros SAC</p>
            </div>
        </div>
    </footer>
</body>
<!-- DISQUS -->
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

    var disqus_config = function () {
        this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier =
            PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };

    (function () { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = 'https://aqparking.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();

</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
        Disqus.</a></noscript>
<script id="dsq-count-scr" src="//aqparking.disqus.com/count.js" async></script>

<!-- FEATHER-ICONS -->
<script src="{{asset('feather-icons/dist/feather.min.js')}}"></script>
<script>
    feather.replace()

</script>

<!-- FONTAWESONE -->
<!-- <script src="https://kit.fontawesome.com/f52de5d372.js" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

<!-- flatpickr time picker JS-->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!--MOTIO-->
<script src="{{asset('js/jquery.motio.js')}}"></script>
<script>
    var element = document.querySelector('.bodyreg');
    var panning = new Motio(element, {
        fps: 30,
        speedX: -100,
        // speedY: -10,
        bgWidth: 1024,
        bgHeight: 1024,
    });
    panning.play();

</script>

<!--PICCKER PARA EL HORARIO-->
<script>
    config = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    }
    flatpickr("#timepkr", config);

</script>

<!-- FIN DEL TIME PICKER -->


<!-- COMIENZA MODAL TYC -->
<script>
    let myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
    myModal.toggle()

    // CANCELAR MODAL --> redirect

    document.getElementById("redirect").onclick = function () {
        window.location.replace('registro.html')
    }

</script>
<!-- FIN MODAL TYC -->

</html>
