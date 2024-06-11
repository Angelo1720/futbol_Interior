<x-app-layout>

    <body>
        <div id="listadoGeneral" class="container mt-5">
            @foreach ($equipos as $equipo)
                <div class="card mb-3">
                    <div class="row g-0">
                        @if ($equipo->traerEscudo() != null)
                            <div class="col-md-4" id="escudoCarta">
                                <img id="imageEscudo" class="img-fluid rounded-start"
                                    src="data:image/jpg;base64,{{ $equipo->traerEscudo()->base64 }}"
                                    alt="Imagen de escudo" style="width: 25%; height: auto;">
                            </div>
                        @else
                            <div class="col-md-4" id="escudoCarta">
                                <img class="img-fluid rounded-start" src="{{ asset('Images/escudo.png') }}"
                                    alt="Imagen de escudo por defecto" id="escudoDefault">
                            </div>
                        @endif
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $equipo->nombreCompleto }}</h5>
                                <div>
                                    <div class=" d-flex itemsEquipo">
                                        <img src="/Images/menu.png" alt="Icono" class="imagenItem m-2">
                                        <p class="card-text"> {{ $equipo->divisional }}</p>
                                    </div>
                                    <div class=" d-flex itemsEquipo">
                                        <img src="/Images/premio-de-futbol.png" alt="Icono" class="imagenItem m-2">
                                        <p class="card-text"> {{ $equipo->cantidadTitulos }}</p>
                                    </div>
                                    <div class=" d-flex itemsEquipo">
                                        <img src="/Images/campo.png" alt="Icono" class="imagenItem m-2">
                                    <p class="card-text"> {{ $equipo->nomCancha }}</p>
                                    </div>
                                    <div class=" d-flex itemsEquipo">
                                        <button type="submit" class="btn btn-primary m-2"><a class="dropdown-item text-white"
                                            href="#">Detalles</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $equipos->links() }}
        </div>
    </body>
</x-app-layout>
