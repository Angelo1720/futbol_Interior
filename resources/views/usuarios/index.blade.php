<x-app-layout>
    <div class="overflow-x-auto">
        <table id="userTable" class="w-full border-collapse border" style="width: 100%;">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Correo</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    @if(session('success'))
    <!-- Modal de éxito -->
    <div class="fixed inset-0 z-10 overflow-y-auto" role="dialog" aria-labelledby="successModalLabel" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="successModalLabel">Éxito</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para mostrar automáticamente el modal -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('successModal');
        var modalBoot = new bootstrap.Modal(modal, {
            keyboard: false
        });
        modalBoot.show();
    });
    </script>
    @endif

    @if(session('error'))
    <!-- Modal de error -->
    <div class="fixed inset-0 z-10 overflow-y-auto" role="dialog" aria-labelledby="errorModalLabel" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="errorModalLabel">Error</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                        data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para mostrar automáticamente el modal -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('errorModal');
        var modalBoot = new bootstrap.Modal(modal, {
            keyboard: false
        });
        modalBoot.show();
    });
    </script>
    @endif

    <!-- Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // DataTable
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('usuarios.getUsers')}}",
            columns: [{
                    data: 'id',
                    className: 'border px-4 py-2'
                },
                {
                    data: 'name',
                    className: 'border px-4 py-2'
                },
                {
                    data: 'email',
                    className: 'border px-4 py-2'
                }
            ]
        });
    });
    </script>
</x-app-layout>