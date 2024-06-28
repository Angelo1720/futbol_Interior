<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Clubes') }}
        </h2>
    </x-slot>
    <body>
        <form action="{{ route('equipos.guest') }}" method="GET" class="d-flex justify-content-center column-gap-2 mt-3">
            @csrf   
            <input type="text" name="buscador" id="buscador" class="form-input input-custom w-25"
            placeholder="Busca un equipo..." autofocus value="{{request('buscador')}}"
            onclick="this.value='';">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        @if ($equipos->isNotEmpty())
            
        <div id="listadoGeneral" class="container mt-3">
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
                                        <button disabled type="submit" class="btn btn-primary m-2"><a class="dropdown-item text-white"
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
                @else
                <div class="d-flex justify-content-center">
                    <div id="sinEdiciones" class="m-5 text-center">
                        Equipo/s no encontrado/s
                    </div>
                </div>
                @endif
    </body>
</x-app-layout>
