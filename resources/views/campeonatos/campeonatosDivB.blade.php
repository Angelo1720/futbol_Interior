<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Segunda División') }}
        </h2>
    </x-slot>

    <body>
        @if ($campeonatosDivB->isNotEmpty())
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-center text-center">
                @foreach ($campeonatosDivB as $index => $campeonatoDivB)
                    @if ($index % 2 == 0 && $index != 0)
            </div>
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-center text-center">
        @endif
        <div class="card mx-5" id="cartasCampeonato">
            <div>
                <img src="{{ asset('Images/portadaCampeonatos.jpg') }}" width="auto" height="150">
            </div>
            <div class="row g-0 m-3">
                <div class="mt-3 mb-3">
                    <h1>{{ $campeonatoDivB->nombre }}</h1>
                    @if ($campeonatoDivB->tipoCampeonato == true)
                        <span class="badge bg-primary">Especial</span>
                    @else
                        <span class="badge bg-success">Liga</span>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
        </div>
        <div class="container mt-5">
            {{ $campeonatosDivB->links() }}
        </div>
    @else
        <div class="position-relative">
            <div id="sinEdiciones" class="m-5 position-absolute top-50 start-50 translate-middle text-center">
                Liga sin campeonatos de divisional B
            </div>
        </div>
        @endif
    </body>
</x-app-layout>
