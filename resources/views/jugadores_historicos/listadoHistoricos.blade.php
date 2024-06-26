@php
    use Carbon\Carbon;
    Carbon::setLocale('es');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Jugadores históricos') }}
        </h2>
    </x-slot>

    <body>
        @if ($historicos->isNotEmpty())
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-center text-center">
                @foreach ($historicos as $index => $historico)
                    @if ($index % 2 == 0 && $index != 0)
            </div>
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-center text-center">
        @endif
        <div class="cartasJugadoresHistoricos">
            @if ($historico->traerPortada() != null)
                <img class="imageJugador rounded"
                    src="data:image/jpg;base64, 
                                    {{ $historico->traerPortada()->base64 }}"
                    alt="Imagen de jugador histórico">
            @endif
            <div class="cuerpoCarta">
            <div class="divInfoJugador">
                <h3>{{ $historico->nombre }} {{ $historico->apellido }}</h3>
                <h5>{{ Carbon::parse($historico->fechaNacimiento)->format('d/m/Y') }}</h5>
            </div>
            <div class="divHistoria">
                <p>{{ $historico->historia }}</p>
            </div>
            </div>
        </div>
        @endforeach
        </div>
        <div class="container mt-5">
            {{ $historicos->links() }}
        </div>
    @else
        <div class="position-relative">
            <div id="sinEdiciones" class="m-5 position-absolute top-50 start-50 translate-middle text-center">
                Sistema sin jugadores históricos
            </div>
        </div>
        @endif
    </body>
</x-app-layout>
