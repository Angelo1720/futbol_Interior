<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Campeonatos') }}
        </h2>
    </x-slot>

    <body>
        @if ($campeonatos->isNotEmpty())
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-between text-center">
                @foreach ($campeonatos as $index => $campeonato)
                    @if ($index % 2 == 0 && $index != 0)
            </div>
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-between text-center">
        @endif
        <div>
            <div class="card" id="cartasCampeonato">
                <div>
                    <img src="{{ asset('Images/portadaCampeonatos.jpg') }}" width="auto" height="150">
                </div>
                <div class="row g-0">
                    <div class="mt-3 mb-3">
                        <h1>{{ $campeonato->nombre }}</h1>
                        <h3>{{ $campeonato->division }}</h3>
                        @if ($campeonato->tipoCampeonato == true)
                            <span class="badge bg-primary">Especial</span>
                        @else
                            <span class="badge bg-success">Liga</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <div class="container mt-5">
            {{ $campeonatos->links() }}
        </div>
    @else
        <div class="position-relative">
            <div id="sinEdiciones" class="m-5 position-absolute top-50 start-50 translate-middle text-center">
                Liga sin campeonatos
            </div>
        </div>
        @endif
    </body>
</x-app-layout>