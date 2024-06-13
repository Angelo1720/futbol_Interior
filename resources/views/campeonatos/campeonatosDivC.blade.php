<x-app-layout>
    <body>
        @if($campeonatosDivC->isNotEmpty())
        <div id="listadoGeneral" class="container mt-5 d-flex justify-content-between">
            @foreach ($campeonatosDivC as $campeonatoDivC)
            <div class="card">
                <div class="row g-0 m-3">
                    <div class="m-3">
                            <h2>{{$campeonatoDivC->nombre}}</h2>
                            @if($campeonatoDivC->tipoCampeonato == true)
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
            {{ $campeonatosDivC->links()}}
        </div>
        @else
            <div class="position-relative">
                <div id="sinEdiciones" class="m-5 position-absolute top-50 start-50 translate-middle text-center">
                    Liga sin campeonatos de divisional C
                </div>
            </div>
        @endif
    </body>
</x-app-layout>