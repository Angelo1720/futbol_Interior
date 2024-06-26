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
            <div>
                @foreach ($historicos as $index => $historico)
                <div class="row justify-content-center">
                    <div class="cartasJugadoresHistoricos">
                        @if ($historico->traerPortada() != null)
                            <img class="imageJugador rounded"
                                src="data:image/jpg;base64, 
                                    {{ $historico->traerPortada()->base64 }}"
                                alt="Imagen de jugador histórico">
                        @else
                            <img class="imageJugador rounded" src="{{ asset('Images/jugador-de-futbol.png') }}">
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
