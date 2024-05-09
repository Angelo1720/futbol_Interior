<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('Images/futbol-InteriorV1.png') }}" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- CSS de Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- JS de Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased pb-5">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <footer class="footer py-4">
        <div class="container d-none d-md-block personalized-footer">
            <div class="row">
                <div class="col-12 col-md-3">
                    <h5 class="text-white pt2">Contacto:</h5>
                    <!--headin5_amrc-->
                    <p>
                        <a href="#">
                            <i class="fa fa-location-arrow pr-2"></i><span id="spanDireccion">Baltasar Brum 875</span>
                        </a>
                    </p>
                    <p>
                        <a href="tel:472 26220" id="linkTel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                              </svg>
                              <span id="spanTel">47224247</span>
                        </a>
                    </p>
                    <p class="text-white">
                        <i class="far fa-calendar-alt pr-2"></i><span id="spanHorario">Lun a Vie de 16:00 a
                            21:30 - Sab de 9:30 a 12:30</span>
                    </p>
                    <a class="nav-link" href="https://www.facebook.com/ligadefutbolpaysandu/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                    </a>
                </div>

                <div class="col-12 col-md-9 pt-2">
                    <iframe id="Mapa"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3371.782318353107!2d-58.09326362356373!3d-32.31770144040195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95afcbfdbc1c5afd%3A0x7baaa8c5dd129685!2sLiga%20de%20futbol%20sanducera!5e0!3m2!1ses-419!2suy!4v1714149758492!5m2!1ses-419!2suy"
                        width="600" height="225" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" width="600" height="250" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                
            </div>
        </div>
        <div class="container divBajoFooter">
            <p class="m-0 text-center text-white">Creado por: <a href="https://utec.edu.uy/es/"
                    target="_blank">UTEC-UDELAR-UTU</a> - Copyright &copy;2024 | 
                    <span id="spanFirma">Franco Sancristóbal - Angelo Festino</span>
            </p>
        </div>
    </footer>
</body>

</html>
