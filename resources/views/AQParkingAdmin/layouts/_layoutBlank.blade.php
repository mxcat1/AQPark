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
    <link href="{{asset('libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('css/theme.min.css')}}">
    <title>Adminsitracion Sistema AQParking - @yield('title')</title>
</head>

<body>

<div class="container d-flex flex-column">
    @yield('content')
</div>

<!-- Scripts -->
<!-- Libs JS -->
<script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('libs/feather-icons/dist/feather.min.js')}}"></script>
<script src="{{asset('libs/prismjs/components/prism-core.min.js')}}"></script>
<script src="{{asset('libs/prismjs/components/prism-markup.min.js')}}"></script>
<script src="{{asset('libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js')}}"></script>
<script src="{{asset('libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('libs/dropzone/dist/min/dropzone.min.js')}}"></script>


<!-- clipboard -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="{{asset('js/theme.min.js')}}"></script>


</body>

</html>
