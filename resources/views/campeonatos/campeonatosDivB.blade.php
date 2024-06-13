<x-app-layout>

    <body>
        @if ($campeonatosDivB->isNotEmpty())
            <div id="listadoGeneral" class="container mt-5 d-flex justify-content-between">
                @foreach ($campeonatosDivB as $campeonatoDivB)
                    <div class="card">
                        <div class="row g-0 m-3">
                            <div class="m-3">
                                <h2>{{ $campeonatoDivB->nombre }}</h2>
                                @if ($campeonatoDivB->tipoCampeonato == true)
                                    <h2>Especial</h2>
                                @else
                                    <h2>Liga</h2>
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
