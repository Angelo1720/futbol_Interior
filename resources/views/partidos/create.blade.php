<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('partidos.store', $edicion->id) }}"
                        class="p-4 border rounded-lg">
                        @csrf
                        <!-- Fecha  -->
                        <div class="mb-3">
                            <label for="fechaPartido" class="form-label label-custom">{{ __('Fecha de partido') }}</label>
                            <input id="fechaPartido" class="form-control input-custom" type="datetime-local"
                                name="fechaPartido" :value="old('fechaPartido')" required autocomplete="fechaPartido" />
                            @error('fechaPartido')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jornada  -->
                        <div class="mb-3">
                            <!-- Nombre jornada -->
                            <label for="nombreJornada"
                                class="form-label label-custom">{{ __('Nombre jornada') }}</label>
                            <input id="nombreJornada" class="form-control input-custom" type="text"
                                name="nombreJornada" :value="old('nombreJornada')" value="Fecha" autofocus
                                autocomplete="nombreJornada" placeholder="Fecha"/>
                            @error('nombreJornada')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <!-- Nro. de jornada -->
                            <label for="nroJornada"
                                class="form-label label-custom">{{ __('Número de jornada') }}</label>
                            <input id="nroJornada" class="form-control input-custom" type="text" name="nroJornada"
                                :value="old('nroJornada')" autofocus autocomplete="nroJornada" />
                            @error('nroJornada')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Equipo local -->
                        <div class="mb-3">
                            <label for="nomEquipoLocal" class="form-label label-custom">{{ __('Equipo local') }}</label>
                            <input type="text" list="equipos" name="nomEquipoLocal" id="nomEquipoLocal"
                                oninput="checkInput(this.id);" class="form-control input-custom mb-3" autocomplete="off"
                                onfocus="this.value=''" onchange="checkInput(this.id); cargarSelectAlineacion(this.id)">

                            <!-- Alineación y suplentes LOCAL -->
                            <div class="mb-3">
                                <label for="alineacionLOCAL" class="form-label label-custom">
                                    {{ __('Ingresar alineación') }}</label>
                                <select class="js-select2 form-select mb-3" name="alineacionLOCAL[]" multiple
                                    id="alineacionLOCAL"></select>

                                <label for="suplentesLOCAL" class="form-label label-custom">
                                    {{ __('Ingresar suplentes') }}</label>
                                <select class="js-select2 form-select mb-3" name="suplentesLOCAL[]" multiple
                                    id="suplentesLOCAL"></select>
                            </div>
                        </div>

                        <!-- Equipo visitante -->
                        <div class="mb-3">
                            <label for="nomEquipoVisitante"
                                class="form-label label-custom">{{ __('Equipo visitante') }}</label>
                            <input type="text" list="equipos" name="nomEquipoVisitante" id="nomEquipoVisitante"
                                class="form-control input-custom mb-3" autocomplete="off" onfocus="this.value=''"
                                onchange="checkInput(this.id); cargarSelectAlineacion(this.id)">

                            <!-- Alineación y suplentes VISITANTE -->
                            <div class="mb-3">

                                <label for="alineacionVISITANTE"
                                    class="form-label label-custom">{{ __('Ingresar alineación') }}</label>
                                <select class="js-select2 form-select mb-3" name="alineacionVISITANTE[]" multiple
                                    id="alineacionVISITANTE"></select>
                                <!-- Suplentes visitante -->
                                <label for="suplentesVISITANTE"
                                    class="form-label label-custom">{{ __('Ingresar suplentes') }}</label>
                                <select class="js-select2 form-select mb-3" name="suplentesVISITANTE[]" multiple
                                    id="suplentesVISITANTE"></select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                    <datalist id="equipos">
                        @foreach ($equiposParticipantes as $equipo)
                            <option value="{{ $equipo->nombre }}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function checkInput(id) {
            const inputTyped = document.getElementById(id);

            const inputLocal = document.getElementById('nomEquipoLocal');
            const inputVisitante = document.getElementById('nomEquipoVisitante');
            if (inputVisitante.value == inputLocal.value) {
                inputTyped.value = '';
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-select2').select2();
        });
    </script>
    <script type="text/javascript">
        const equiposJugadores = @json($equiposJugadores);

        function cargarSelectAlineacion(inputId) {
            const equipo = document.getElementById(inputId).value;
            const select = inputId == 'nomEquipoLocal' ?  document.getElementById('alineacionLOCAL') : document.getElementById('alineacionVISITANTE');
            // Limpiar las opciones anteriores
            select.innerHTML = '';

            if (equiposJugadores[equipo]) {
                const jugadores = equiposJugadores[equipo];

                for (const [posicion, nombres] of Object.entries(jugadores)) {
                    const optgroup = document.createElement('optgroup');
                    optgroup.label = posicion;

                    nombres.forEach(nombre => {
                        const option = document.createElement('option');
                        option.value = nombre;
                        option.textContent = nombre;
                        optgroup.appendChild(option);
                    });

                    select.appendChild(optgroup);
                }
            }
        }
    </script>
</x-app-layout>
