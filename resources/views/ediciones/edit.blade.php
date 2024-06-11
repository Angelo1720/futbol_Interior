@php
    use Carbon\Carbon;
    Carbon::setLocale('es');
@endphp

<x-app-layout>

    <body>
        @role('admin_Liga')
            <div id="infoEdicion" class="d-flex justify-content-between mx-5 mt-5 mb-1">
                <div class="d-flex align-content-start row pb-0">
                    <h1 class="p-0 m-0 ms-2">{{ $campeonato->nombre }} - {{ $edicion->nombre }} <span
                            name="fechaEdicion">{{ Carbon::parse($edicion->fechaInicio)->format('Y') }}</span></h1>
                    <div class="mt-5 p-0">
                        <button type="submit" class="btn btn-primary mx-2">
                            <a class="dropdown-item text-white"
                                href="{{ route('ediciones.index', ['idCampeonato' => $edicion->idCampeonato]) }}">Editar
                                información
                            </a>
                        </button>
                        <button type="submit" class="btn btn-primary mx-2">
                            <a class="dropdown-item text-white" href="#">Añadir equipo
                            </a>
                        </button>
                        <button type="submit" class="btn btn-primary mx-2">
                            <a class="dropdown-item text-white"
                                href="{{ route('partidos.create', ['idEdicion' => $edicion->id]) }}">Crear Partido
                            </a>
                        </button>

                    </div>
                </div>
                <div class="border border-3 p-3 rounded-3 mt-0 pb-0 pt-2">
                    <p class="display-6 fw-semibold">Duración de campeonato</p>
                    <p class="display-6 mx-3 my-0">{{ Carbon::parse($edicion->fechaInicio)->format('d/m') }}
                        - {{ Carbon::parse($edicion->fechaFinal)->format('d/m') }}</p>
                </div>

            </div>
            <div class="d-flex justify-content-between mt-4">
                <div name="clubesParticipantes" class="w-50 mx-4">
                    <div class="d-flex justify-content-center w-100">
                        <h2>Clubes participantes</h2>
                    </div>
                    <div id="clubesParticipantes" class="container m-0 p-0">
                        <div class="row d-flex justify-content-center w-100 m-0 p-0">
                            @foreach ($equiposParticipantes as $index => $equipo)
                                @if ($index % 2 == 0 && $index != 0)
                        </div>
                        <div class="row d-flex justify-content-center w-100 m-0 p-0">
                            @endif
                            <div class="col-md-4 p-2 m-2 border rounded-2 d-flex">
                                <div>
                                    <img id="imgEquipo" src="data:image/jpg;base64, {{ $equipo->traerEscudo()->base64 }}"
                                        alt="Imágen escudo">
                                </div>
                                <div id="nombreEquipo" class="w-100 d-flex align-self-sm-center justify-content-center">
                                    <p class="m-0">{{ $equipo->nombreCorto }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div name="partidosSiguientes" class="w-50 mx-4">
                    <div class="d-flex justify-content-center w-100">
                        <h2>Partidos</h2>
                    </div>
                    <div class="row">
                        <<div class="accordion" id="accordionExample">
                            @foreach ($partidosPorJornada as $nroJornada => $partidos)
                                <div class="card">
                                    <div class="card-header row" id="heading{{ $nroJornada }}">
                                        <button class="btn btn-link text-decoration-none text-black" type="button"
                                            data-toggle="collapse" data-target="#collapse{{ $nroJornada }}"
                                            aria-expanded="true" aria-controls="collapse{{ $nroJornada }}">
                                            <h5 class="mb-0 ">
                                                <strong>Fecha {{ $nroJornada }}</strong>
                                            </h5>
                                        </button>
                                    </div>

                                    <div id="collapse{{ $nroJornada }}" class="collapse"
                                        aria-labelledby="heading{{ $nroJornada }}" data-parent="#accordionExample">
                                        <div class="card-body">
                                            @foreach ($partidos as $partido)
                                                <p><strong>{{ Carbon::parse($partido->fecha)->format('d/m/Y - H:m') }}</strong>
                                                    -
                                                    {{ $partido->nomEquipoLocal }} vs
                                                    {{ $partido->nomEquipoVisitante }}
                                                </p>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
            </div>
        @endrole
        @if (session('success'))
            <!-- Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script para mostrar automáticamente el modal -->
            <script>
                $(document).ready(function() {
                    $('#successModal').modal('show');
                });
            </script>
        @endif


        @if (session('error'))
            <!-- Modal -->
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="errorModalLabel">Error</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('error') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script para mostrar automáticamente el modal -->
            <script>
                $(document).ready(function() {
                    $('#errorModal').modal('show');
                });
            </script>
        @endif
    </body>
</x-app-layout>
