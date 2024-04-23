<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    @auth
        @role('admin_Liga')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __('Eres un administrador de Liga!') }}
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary">Primary</button>
            <button type="button" class="btn btn-secondary">Secondary</button>
            <button type="button" class="btn btn-success">Success</button>
            <button type="button" class="btn btn-danger">Danger</button>
            <button type="button" class="btn btn-warning">Warning</button>
            <button type="button" class="btn btn-info">Info</button>
            <button type="button" class="btn btn-light">Light</button>
            <button type="button" class="btn btn-dark">Dark</button>

            <button type="button" class="btn btn-link">Link</button>

            <button type="button" class="btn btn-outline-primary">Primary</button>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>
            <button type="button" class="btn btn-outline-success">Success</button>
            <button type="button" class="btn btn-outline-danger">Danger</button>
            <button type="button" class="btn btn-outline-warning">Warning</button>
            <button type="button" class="btn btn-outline-info">Info</button>
            <button type="button" class="btn btn-outline-light">Light</button>
            <button type="button" class="btn btn-outline-dark">Dark</button>

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Mi App Laravel</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Acerca de</a>
                            </li>
                            <!-- Más elementos de Navbar -->
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Bienvenido a mi App</h1>
                        <p class="lead">Este es un ejemplo básico de una página utilizando Bootstrap en Laravel.</p>
                        <a class="btn btn-primary" href="#" role="button">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Otros scripts -->
            <script>
                // Script de ejemplo usando jQuery
                $(document).ready(function() {
                    // Ejemplo de clic en el botón
                    $(".btn-primary").click(function() {
                        alert("¡Haz clic en el botón!");
                    });
                });
            </script>
        @endrole
    @endauth
</x-app-layout>
