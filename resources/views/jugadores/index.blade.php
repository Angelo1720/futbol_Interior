<x-app-layout>
    <body>
        @role('admin_Liga')
            <div class="d-inline-flex w-100 justify-content-between mt-5">
                <div class="ms-5 d-inline-flex align-middle w-50">
                    @if ($equipo->traerEscudo() != null)
                        <img id="imgEquipo" class="m-0 align-self-center"
                            src="data:image/jpg;base64, {{ $equipo->traerEscudo()->base64 }}" alt="Imagen de escudo">
                    @else
                        <img class="img-fluid rounded-start" src="{{ asset('Images/escudo.png') }}"
                            alt="Imagen de escudo por defecto" id="imgAlternativaJugaodores">
                    @endif

                    <h1 class="m-0 ms-2 align-self-center">{{ $equipo->nombreCorto }}</h1>
                </div>
                <div class="me-5 w-50 d-flex justify-content-end">
                    <form method="POST" action="{{ route('jugadores.setJugadorEquipo', $equipo->id) }}" class="d-inline-block ms-5 w-75">
                        @csrf
                            <label for="jugador-equipo" class="form-label label-custom">
                                {{ __('Añadir jugador a equipo') }}
                            </label>
                            <select type="text" name="jugador-equipo[]" id="jugador-equipo" 
                            class="js-select2 form-control input-custom w-75 custom-select2"></select>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Añadir jugador/es')}}
                        </button>
                    </form>
                </div>
            </div>
            <div class="m-5">
                <button type="submit" class="btn btn-primary m-2"><a class="dropdown-item text-white"
                        href="{{ route('jugadores.create', ['idEquipo' => $equipo->id]) }}">Crear jugador</a></button>


            </div>
            @if ($jugadores->isNotEmpty())
                <div class="m-5 text-center" style="overflow-x:auto;">
                    <table id='jugadoresTable' width='98%' class="table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <td>Nombre</td>
                                <td class="tdPosicionJugadores">Posicion</td>
                                <td class="tdFechaJugadores">Fecha de nacimiento</td>
                                <td class="tdAccionesJugadores">Acciones</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            @else
                <div class="d-flex justify-content-center w-100 text-center">
                    <div class="sinJugadores">
                        <h2>Equipo sin jugadores</h2>
                    </div>
                </div> 
            @endif
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

        <!-- Script -->
        <script type="text/javascript">
            $(document).ready(function() {
                // Datos de los jugadores que no participan (pasados desde el controlador)
                var jugadoresNotInEquipo = @json($jugadoresNotInEquipo);
        
                // Convertir los datos de jugadores en el formato esperado por select2
                var jugadores = jugadoresNotInEquipo.map(function(jugador) {
                    return {
                        id: jugador.id, // El valor que quieres enviar al backend
                        text: jugador.nombre + ' ' + jugador.apellido // El texto que se mostrará en el select
                    };
                });
        
                // Inicializar select2
                $('#jugador-equipo').select2({
                    data: jugadores,
                    multiple: true,
                    placeholder: 'Seleccione un jugador',
                    allowClear: true
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {                
                // DataTable
                $('#jugadoresTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('jugadores.getJugadores', $equipo->id) }}",
                    columns: [{
                            data: 'nombre'
                        },
                        {
                            data: 'posicion'
                        },
                        {
                            data: 'fechaNacimiento'
                        },
                        {
                            "orderable": false,
                            targets: 0,
                            "data": null,
                            "render": function(data, type, row) {
                                var editarUrl = "{{ route('jugadores.edit', ':id') }}";
                                editarUrl = editarUrl.replace(':id', row.id);
                                var quitarUrl = "{{ route('jugadores.deleteJugadorEquipo', ':id') }}";
                                quitarUrl = quitarUrl.replace(':id', row.id);
                                return '<div id="divAcciones"><form id="formEditarJugador_' + row.id +
                                    '" method="POST" action="' + editarUrl + '">' +
                                    '<input type="hidden" name="_method" value="GET">' +
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                    '<button class="btn btn-outline-secondary m-2">Editar</button>' +
                                    '</form>' +
                                    '<form id="formEliminarJugador_' + row.id +
                                    '" method="POST" action="' + quitarUrl +
                                    '" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este jugador?\')">' +
                                    '<input type="hidden" name="_method" value="DELETE">' +
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                    '<button type="submit" class="btn btn-outline-danger m-2">Quitar jugador</button>' +
                                    '</form></div>';
                            }
                        }
                    ],
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            });
        </script>
        

    </body>
</x-app-layout>
