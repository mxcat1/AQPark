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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>AQParking - @yield('title')</title>
</head>
<body>
    <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-light bg-sky">
        <div class="container-fluid">
            <a href="{{ route('indexusr') }}" class="text-decoration-none" title="Link to INDEX">
            <img src="img/logo.png" title="logo AQPparking" alt="logo AQPparking" class="img-fluid ms-2" style="width: 7em;"></a>
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
                        <button class="btn btn-primary" type="submit" id="barrabuscarheader"><i data-feather="search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mb-2 mb-lg-0">
                        <a href="{{ route('registro') }}">
                            <button type="submit" class="btn btn-secondary mx-3" id="btn_registro"
                                name="btn_registro">Registrarse</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}">
                            <button type="button" class="btn btn-primary mx-2" id="btn_sesion" name="btn_sesion">Iniciar
                                Sesión</button>
                        </a>
                    </li>
                    <li class="nav-item d-none">
                        <a href="{{ route('cuenta-usr') }}">
                            <button type="button" class="btn btn-primary mx-2" id="btn_sesion" name="btn_sesion">Mi cuenta</button>
                        </a>
                    </li>
                    <li class="nav-item d-none">
                        <a href="{{ route('cuenta-parking') }}">
                            <button type="button" class="btn btn-primary mx-2" id="btn_sesion" name="btn_sesion">Mi estacionamiento</button>
                        </a>
                    </li>
                </ul>
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
                    <div class="col col-lg-12">
                        <img src="img/logo.png" title="logo AQPparking" alt="logo AQPparking">
                        <a class="text-light display-6 px-4 text-dark" href="#" target="_blank" alt="icono instagram" title="Link to Instsgram"><i data-feather="instagram"></i></i></a>
                        <a class="text-light display-6 px-4 text-dark" href="#" target="_blank" alt="icono twitter" title="Link to Twitter"><i data-feather="twitter"></i></i></a>
                        <a class="text-light display-6 px-4 text-dark" href="#" target="_blank" alt="icono facebook" title="Link to Facebook"><i data-feather="facebook"></i></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row tyc">
                        <div class=" col-lg-4">
                            <a href="{{url('terminos')}}" title="Link Terminos y condiciones">Terminos y condiciones</a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="{{url('privacidad')}}" title="Link Política de privacidad">Política de privacidad</a>
                        </div>
                        <div class=" col-lg-4">
                            <a href="{{url('cookies')}}" title="Política de Cookies">Política de Cookies</a>
                        </div>
                        <div class="row end">
                            <p class="text-center">© <span id="anio"></span> AQParking.com by Nosotros SAC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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

    <!-- MODAL MAPA-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estacionamiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div name="mapa">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.823010982409!2d-77.0388858854909!3d-12.12590987909898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8f8b8d8b8f7%3A0x8f8d8b8d8b8d8b8d!2sParqueo%20AQParking!5e0!3m2!1ses!2spe!4v1580790982796!5m2!1ses!2spe"
                            width="100%" height="100%" class="vh-100" frameborder="0" style="border:0;"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<!-- <script src="https://kit.fontawesome.com/f52de5d372.js" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/script.js"></script>
<script src="js/jquery.motio.js"></script>
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

</html>