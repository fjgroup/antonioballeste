<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>AntonioBalleste</title>
    <meta name="description" content="Garantizamos Evaluación Neuromusculo esquelética, programación y periodizacion en etapas de desarrollo deportivo, Técnicas manuales, kinesiología deportiva, sport development y ,as">
    <meta name="keywords" content="Ejercicios físico adaptado">
    <meta name="author" content="Cesar JM Figueroa J, Fj Group CA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- Customized mi css -->
    <link href="{{ asset('css/mi_base.css') }}" rel="stylesheet">
</head>

<body class="bg-white">

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
