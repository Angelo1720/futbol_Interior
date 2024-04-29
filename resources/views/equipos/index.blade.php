<x-app-layout>

    <body>
        @role('admin_Liga')
        <div id="divBotonCrear">
            <button type="submit" class="btn btn-primary"><a class="dropdown-item text-white" href="#">Crear
                    Equipo</a></button>
        </div>

        <div class="table-responsive" style="overflow-x:auto;">
            <table id='equipoTable' width='100%' border="1" style='border-collapse: collapse;'>
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Divisional</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
            </table>
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

        <!-- Script -->
        <script type="text/javascript">
            $(document).ready(function() {

                // DataTable
                $('#equipoTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('equipo.getEquipos') }}",
                    columns: [{
                            data: 'nombre'
                        },
                        {
                            data: 'divisional'
                        },
                    ]
                });

            });
        </script>

    </body>
</x-app-layout>
