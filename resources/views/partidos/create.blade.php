<x-app-layout>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-7">
                <div class="card-body">
                    <form method="POST" action="{{ route('partidos.store', $edicion->id) }}"
                        class="p-4 border rounded-lg" onsubmit="prepareFormData()">
                        @csrf
                        <div class="d-flex justify-content-between mb-4 p-0">
                            <!-- Fecha  -->
                            <div class="mx-3 text-center">
                                <label for="fechaPartido"
                                    class="form-label label-custom">{{ __('Fecha de partido') }}</label>
                                <input id="fechaPartido" class="form-control input-custom" type="datetime-local"
                                    name="fechaPartido" :value="old('fechaPartido')" required
                                    autocomplete="fechaPartido" />
                                @error('fechaPartido')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jornada  -->
                            <div class="mx-3 text-center">
                                <!-- Nombre jornada -->
                                <label for="nombreJornada"
                                    class="form-label label-custom">{{ __('Nombre jornada') }}</label>
                                <input id="nombreJornada" class="form-control input-custom" type="text"
                                    name="nombreJornada" :value="old('nombreJornada')" value="Fecha" autofocus
                                    autocomplete="nombreJornada" placeholder="Fecha" />
                                @error('nombreJornada')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mx-3 text-center">
                                <!-- Nro. de jornada -->
                                <label for="nroJornada"
                                    class="form-label label-custom">{{ __('Número de jornada') }}</label>
                                <input id="nroJornada" class="form-control input-custom" type="text"
                                    name="nroJornada" :value="old('nroJornada')" autofocus autocomplete="nroJornada" />
                                @error('nroJornada')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo oculto para almacenar los datos JSON -->
                        <input type="hidden" name="dataEquipoLocal" id="dataEquipoLocal">
                        <input type="hidden" name="dataEquipoVisitante" id="dataEquipoVisitante">

                        <!-- EQUIPOS -->
                        <div class="d-flex justify-content-between">
                            <!-- Equipo local -->
                            <div class="mb-3 col-5 p-1">
                                <label for="nomEquipoLocal"
                                    class="form-label label-custom">{{ __('Equipo local') }}</label>
                                <input type="text" list="equipos" name="nomEquipoLocal" id="nomEquipoLocal"
                                    class="form-control input-custom mb-3" autocomplete="off"
                                    onfocus="clearInput(this.id);"
                                    onchange="checkInput(this.id); cargarSelect(this.id)">

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
                            <div class="mb-3 col-5 p-1">
                                <label for="nomEquipoVisitante"
                                    class="form-label label-custom">{{ __('Equipo visitante') }}</label>
                                <input type="text" list="equipos" name="nomEquipoVisitante" id="nomEquipoVisitante"
                                    class="form-control input-custom mb-3" autocomplete="off"
                                    onfocus="clearInput(this.id);"
                                    onchange="checkInput(this.id); cargarSelect(this.id)">

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
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary w-25">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                    <datalist id="equipos">
                        @foreach ($equiposParticipantes as $equipo)
                            <option value="{{ $equipo->nombreCorto }}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function clearInput(inputId) {
            const inputFocus = document.getElementById(inputId);
            inputFocus.value = '';
            if (inputId == 'nomEquipoLocal') {
                document.getElementById('alineacionLOCAL').innerHTML = '';
                document.getElementById('suplentesLOCAL').innerHTML = '';
            } else {
                document.getElementById('alineacionVISITANTE').innerHTML = '';
                document.getElementById('suplentesVISITANTE').innerHTML = '';
            }
        }
    
        function checkInput(id) {
            const inputTyped = document.getElementById(id);

            const inputLocal = document.getElementById('nomEquipoLocal');
            const inputVisitante = document.getElementById('nomEquipoVisitante');
            if (inputVisitante.value == inputLocal.value) {
                inputTyped.value = '';
            }
        }
    
        $(document).ready(function() {
            $('.js-select2').select2();
        });
    
        const equiposJugadores = @json($equiposJugadores);
        function cargarSelect(inputId) {
            const equipo = document.getElementById(inputId).value;
            const select = inputId == 'nomEquipoLocal' ? document.getElementById('alineacionLOCAL') : document
                .getElementById('alineacionVISITANTE');
            const selectSuplentes = inputId == 'nomEquipoLocal' ? document.getElementById('suplentesLOCAL') : document
                .getElementById('suplentesVISITANTE');
            // Limpiar las opciones anteriores
            select.innerHTML = '';
            selectSuplentes.innerHTML = '';

            if (equiposJugadores[equipo]) {
                const jugadores = equiposJugadores[equipo];

                for (const [posicion, nombres] of Object.entries(jugadores)) {
                    const optgroupAlign = document.createElement('optgroup');
                    const optgroupSuplies = document.createElement('optgroup');
                    optgroupAlign.label = posicion;
                    optgroupSuplies.label = posicion;

                    nombres.forEach(nombre => {
                        const optionAlign = document.createElement('option');
                        const optionSuplies = document.createElement('option');
                        optionAlign.value = nombre;
                        optionAlign.textContent = nombre;
                        optionAlign.setAttribute("data-position", posicion);
                        optgroupAlign.appendChild(optionAlign);

                        optionSuplies.value = nombre;
                        optionSuplies.textContent = nombre;
                        optionSuplies.setAttribute("data-position", posicion);
                        optgroupSuplies.appendChild(optionSuplies);
                    });

                    select.appendChild(optgroupAlign);
                    selectSuplentes.appendChild(optgroupSuplies);
                }
            }
        }
    
        function prepareFormData() {
            const alineacionLocal = document.getElementById('alineacionLOCAL');
            const suplentesLocal = document.getElementById('suplentesLOCAL');
            const alineacionVisitante = document.getElementById('alineacionVISITANTE');
            const suplentesVisitante = document.getElementById('suplentesVISITANTE');
    
            const dataEquipoLocal = {
                alineacion: Array.from(alineacionLocal.options)
                            .filter(option => option.selected)
                            .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') })),
                            suplentes: Array.from(suplentesLocal.options)
                            .filter(option => option.selected)
                            .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') }))
            };
    
            const dataEquipoVisitante = {
                alineacion: Array.from(alineacionVisitante.options)
                                .filter(option => option.selected)
                                .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') })),
                suplentes: Array.from(suplentesVisitante.options)
                                .filter(option => option.selected)
                                .map(option => ({ nombre: option.value, posicion: option.getAttribute('data-position') }))
            };
            document.getElementById('dataEquipoLocal').value = JSON.stringify(dataEquipoLocal);
            document.getElementById('dataEquipoVisitante').value = JSON.stringify(dataEquipoVisitante);
        }
    </script>    
</x-app-layout>
