@php
    use Carbon\Carbon;
    Carbon::setLocale('es');
@endphp

<x-app-layout>

    <body>
        @role('admin_Liga')
            <div id="infoEdicion" class="d-flex justify-content-between mx-5 mt-5 mb-5">
                <div class="d-flex row pb-0">
                    <h1 class="p-0 m-0 ms-2">{{ $campeonato->nombre }} - {{ $edicion->nombre }} <span
                            name="fechaEdicion">{{ Carbon::parse($edicion->fechaInicio)->format('Y') }}</span></h1>
                    <div class="mt-5 p-0 d-flex align-items-start">
                        <button type="submit" class="btn btn-primary mx-2 bttEditEdicion">

                            <a class="dropdown-item text-white"
                                href="{{ route('ediciones.editInfo', ['id' => $edicion->id]) }}">Editar
                                información
                            </a>
                        </button>
                        <button type="submit" class="btn btn-primary mx-2 bttEditEdicion" {{ count($equiposParticipantes) < 2 ? 'disabled' : '' }}>
                            <a class="dropdown-item text-white"
                                href="{{ route('partidos.create', ['idEdicion' => $edicion->id]) }}">Crear Partido
                            </a>
                        </button>
                        <form method="POST" action="{{ route('ediciones.setEdicionEquipo', $edicion->id) }}"
                            class="d-flex flex-row ms-5 col-5">
                            @csrf
                            <div class="d-flex flex-column w-75">
                            <label for="edicion-equipo" class="form-label label-custom">
                                {{ __('Añadir equipo a edición') }}
                            </label>
                            <select type="text" name="edicion-equipo[]" id="edicion-equipo"
                                class="js-select2 form-control input-custom w-100" required></select>
                            </div>
                            <button type="submit" class="btn btn-primary ml-2 h-50 bttEditEdicion">
                                Añadir equipo
                            </button>
                        </form>

                    </div>
                </div>
                <div class="border border-3 p-3 rounded-3 d-flex flex-column justify-content-center text-center w-25">
                    <p class="fs-3 fw-bold">Duración de campeonato</p>
                    <p class="fs-2 m-0">{{ Carbon::parse($edicion->fechaInicio)->format('d/m') }}
                        - {{ Carbon::parse($edicion->fechaFinal)->format('d/m') }}</p>
                </div>

            </div>
            <div class="d-flex justify-content-between mt-4">
                <div name="clubesParticipantes" class="w-50 h-50 mx-4">
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
                            <span class="position-relative col-md-5" id="spanNro_{{$index}}">
                                <svg class="svgEliminarEquipo" onclick="quitarEquipoEdicion('{{($equipo->id)}}', '{{($edicion->id)}}');" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                  </svg>
                                <a href="#" x class="text-decoration-none text-black w-100">
                                    <div id="anchorEquipo" class="w-100 p-2 m-2 border rounded-2 d-flex">
                                        @if ($equipo->traerEscudo() != null)
                                            <div>
                                                <img id="imgEquipo"
                                                    src="data:image/jpg;base64, {{ $equipo->traerEscudo()->base64 }}"
                                                    alt="Imágen escudo">
                                            </div>
                                        @else
                                            <div>
                                                <img class="img-fluid rounded-start" src="{{ asset('Images/escudo.png') }}"
                                                    alt="No posee escudo" id="imgEquipo">
                                            </div>
                                        @endif
                                        <div id="nombreEquipo"
                                            class="w-100 d-flex align-self-sm-center justify-content-center">
                                            <p class="m-0">{{ $equipo->nombreCorto }}</p>
                                        </div>
                                    </div>
                                </a>
                            </span>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="w-50 mx-4">
                    <div class="d-flex justify-content-center w-100">
                        <h2>Partidos</h2>
                    </div>
                    <div id="partidosSiguientes" class="d-flex flex-column p-3">
                        <div class="accordion" id="accordionExample">
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
    <script type="text/javascript">
        $(document).ready(function() {
            // Datos de los equipos que no participan (pasados desde el controlador)
            var equiposNOparticipantes = @json($equiposNOparticipantes);

            // Convertir los datos de equipos en el formato esperado por select2
            var equipoOptions = equiposNOparticipantes.map(function(equipo) {
                return {
                    id: equipo.id, // El valor que quieres enviar al backend
                    text: equipo.nombreCorto // El texto que se mostrará en el select
                };
            });

            // Inicializar select2
            $('#edicion-equipo').select2({
                data: equipoOptions,
                multiple: true,
                placeholder: 'Seleccione un club',
                allowClear: true
            });
        });
    </script>
</x-app-layout>
