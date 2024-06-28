<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Segunda División') }}
        </h2>
    </x-slot>

    <body>
        <form action="{{ route('div-B.guest') }}" method="GET" class="d-flex justify-content-center column-gap-2 mt-3">
            @csrf
            <input type="text" name="buscador" id="buscador" class="form-input input-custom"
                placeholder="Busca un campeonato..." autofocus value="{{ request('buscador') }}"
                onclick="this.value='';">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        @if ($campeonatosDivB->isNotEmpty())
            <div class="container mt-5 d-flex justify-content-center text-center">
                @foreach ($campeonatosDivB as $index => $campeonatoDivB)
                    @if ($index % 2 == 0 && $index != 0)
            </div>
            <div class="container mt-5 d-flex justify-content-center text-center">
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
        <div class="d-flex justify-content-center">
            <div id="sinEdiciones" class="m-5 text-center">
                Liga sin campeonatos de Divisional B
            </div>
        </div>
        @endif
    </body>
</x-app-layout>
