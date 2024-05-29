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
                            <input id="fechaPartido" class="form-control input-custom" type="date"
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
                                name="nombreJornada" :value="old('nombreJornada')" required autofocus
                                autocomplete="nombreJornada" />
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
                            <select name="nomEquipoLocal" id="nomEquipoLocal" class="form-select mb-3">
                                <option value="eq1">{{ __('Equipo 1') }}</option>
                                <option value="eq2">{{ __('Equipo 2') }}</option>
                            </select>

                            <!-- Alineación y suplentes LOCAL -->
                            <div class="mb-3">
                                <!-- Botón ingresar alineación -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalAlineacionLOCAL">
                                    {{ __('Ingresar alineación') }}
                                </button>
                                <!-- Modal alineacion -->
                                <div class="modal fade" id="modalAlineacionLOCAL" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ __('Ingresar alineación') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="arqueroLoc" class="form-label label-custom">
                                                        {{ __('Arquero:') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        id="arqueroLoc" />
                                                </div>
                                                <!-- defensas -->
                                                <div class="mb-3">
                                                    <label for="cantDefensasLoc" class="form-label label-custom">
                                                        {{ __('¿Cuantos defensas?') }}
                                                        <input id="cantDefensasLoc" type="number">
                                                    </label>
                                                    Generar inputs dinamicamente por input de cantDefensas
                                                </div>
                                                <!-- mediocampistas -->
                                                <div class="mb-3">
                                                    <label for="cantMedioLoc" class="form-label label-custom">
                                                        {{ __('¿Cuantos mediocampistas?') }}
                                                        <input id="cantMedioLoc" type="number">
                                                    </label>
                                                    Generar inputs dinamicamente por input de cantMediocampistas
                                                </div>
                                                <!-- delanteros -->
                                                <div class="mb-3">
                                                    <label for="cantDelanterosLoc" class="form-label label-custom">
                                                        {{ __('¿Cuantos delanteros?') }}
                                                        <input id="cantDelanterosLoc" type="number">
                                                    </label>
                                                    Generar inputs dinamicamente por input de cantDelanteros
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ __('Cerrar') }}</button>
                                                <button type="button"
                                                    class="btn btn-primary">{{ __('Guardar cambios') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botón ingresar suplentes -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalSuplentesLOCAL">
                                    {{ __('Ingresar suplentes') }}
                                </button>
                                <!-- Modal suplentes -->
                                <div class="modal fade" id="modalSuplentesLOCAL" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ __('Ingresar suplentes') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label for="suplente-1_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 1') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-1_LOCAL" id="suplente-1_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-2_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 2') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-2_LOCAL" id="suplente-2_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-3_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 3') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-3_LOCAL" id="suplente-3_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-4_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 4') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-4_LOCAL" id="suplente-4_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-5_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 5') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-5_LOCAL" id="suplente-5_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-6_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 6') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-6_LOCAL" id="suplente-6_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-7_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 7') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-7_LOCAL" id="suplente-7_LOCAL" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-8_LOCAL"
                                                        class="form-label label-custom">{{ __('Suplente 8') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-8_LOCAL" id="suplente-8_LOCAL" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ __('Cerrar') }}</button>
                                                <button type="button"
                                                    class="btn btn-primary">{{ __('Guardar cambios') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Equipo visitante -->
                        <div class="mb-3">
                            <label for="nomEquipoVisitante"
                                class="form-label label-custom">{{ __('Equipo visitante') }}</label>
                            <select name="nomEquipoVisitante" id="nomEquipoVisitante" class="form-select mb-3">
                                <option value="eq3">{{ __('Equipo 3') }}</option>
                                <option value="eq4">{{ __('Equipo 4') }}</option>
                            </select>

                            <!-- Alineación y suplentes VISITANTE -->
                            <div class="mb-3">
                                <!-- Botón ingresar alineación -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalAlineacionVISITANTE">
                                    {{ __('Ingresar alineación') }}
                                </button>
                                <!-- Modal alineacion -->
                                <div class="modal fade" id="modalAlineacionVISITANTE" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ __('Ingresar alineación') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="arqueroVis" class="form-label label-custom">
                                                        {{ __('Arquero:') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        id="arqueroVis" />
                                                </div>
                                                <!-- defensas -->
                                                <div class="mb-3">
                                                    <label for="cantDefensasVis" class="form-label label-custom">
                                                        {{ __('¿Cuantos defensas?') }}
                                                        <input type="number">
                                                    </label>
                                                    Generar inputs dinamicamente por input de cantDefensas
                                                </div>
                                                <!-- mediocampistas -->
                                                <div class="mb-3">
                                                    <label for="cantMedioVis" class="form-label label-custom">
                                                        {{ __('¿Cuantos mediocampistas?') }}
                                                        <input type="number">
                                                    </label>
                                                    Generar inputs dinamicamente por input de cantMediocampistas
                                                </div>
                                                <!-- delanteros -->
                                                <div class="mb-3">
                                                    <label for="cantMedioVis" class="form-label label-custom">
                                                        {{ __('¿Cuantos delanteros?') }}
                                                        <input type="number">
                                                    </label>
                                                    Generar inputs dinamicamente por input de cantDelanteros
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ __('Cerrar') }}</button>
                                                <button type="button"
                                                    class="btn btn-primary">{{ __('Guardar cambios') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botón ingresar suplentes -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalSuplentesVISITANTE">
                                    {{ __('Ingresar suplentes') }}
                                </button>
                                <!-- Modal suplentes -->
                                <div class="modal fade" id="modalSuplentesVISITANTE" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ __('Ingresar suplentes') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label for="suplente-1_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 1') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-1_VISITANTE" id="suplente-1_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-2_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 2') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-2_VISITANTE" id="suplente-2_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-3_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 3') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-3_VISITANTE" id="suplente-3_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-4_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 4') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-4_VISITANTE" id="suplente-4_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-5_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 5') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-5_VISITANTE" id="suplente-5_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-6_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 6') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-6_VISITANTE" id="suplente-6_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-7_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 7') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-7_VISITANTE" id="suplente-7_VISITANTE" />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="suplente-8_VISITANTE"
                                                        class="form-label label-custom">{{ __('Suplente 8') }}</label>
                                                    <input type="text" class="form-control input-custom"
                                                        name="suplente-8_VISITANTE" id="suplente-8_VISITANTE" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ __('Cerrar') }}</button>
                                                <button type="button"
                                                    class="btn btn-primary">{{ __('Guardar cambios') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
