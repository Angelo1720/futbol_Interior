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
                        <div class="d-flex justify-content-between" id="data-container" 
                        data-equipos-jugadores="{{json_encode($equiposJugadores)}}">
                            <!-- Equipo local -->
                            <div class="mb-3 col-5 p-1">
                                <label for="nomEquipoLocal"
                                    class="form-label label-custom">{{ __('Equipo local') }}</label>
                                <input type="text" list="equipos" name="nomEquipoLocal" id="nomEquipoLocal"
                                    class="form-control input-custom mb-3" autocomplete="off"
                                    onfocus="clearInput(this.id);"
                                    onchange="checkInput(this.id); cargarSelect(this.id);">

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
                                    onchange="checkInput(this.id); cargarSelect(this.id);">

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
        $(document).ready(function() {
            $('.js-select2').select2();
        });
    </script>
</x-app-layout>
