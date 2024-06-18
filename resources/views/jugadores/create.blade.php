<x-app-layout>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('jugadores.store', $equipo->id) }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- nombre -->
                        <div class="mb-3">
                            <label for="nameJugador" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="nameJugador" class="form-control input-custom" type="text" name="nameJugador"
                                :value="old('nameJugador')" required autofocus autocomplete="nameJugador"/>
                                @error('nameJugador')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- apellido -->
                        <div class="mb-3">
                            <label for="apellidoJugador" class="form-label label-custom">{{ __('Apellido') }}</label>
                            <input id="apellidoJugador" class="form-control input-custom" type="text" name="apellidoJugador"
                                :value="old('apellidoJugador')" required autofocus autocomplete="apellidoJugador"/>
                                @error('apellidoJugador')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="mb-3">
                            <label for="fechaNacimiento" class="form-label label-custom">{{ __('Fecha de nacimiento') }}</label>
                            <input id="fechaNacimiento" class="form-control input-custom" type="date" name="fechaNacimiento"
                                :value="old('fechaNacimiento')" required autocomplete="fechaNacimiento" />
                                @error('fechaNacimiento')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="posicion" class="col-form-label label-custom"> {{ __('Posición')}} </label>
                                <select name="posicion" id="posicion" class="form-select mb-3"> 
                                        <option value="">Seleccione...</option>
                                        <option value="Arquero">{{ __('Arquero')}}</option>
                                        <option value="Defensa central">{{ __('Defensa central')}}</option>
                                        <option value="Lateral izquierdo">{{ __('Lateral izquierdo')}}</option>
                                        <option value="Lateral derecho">{{ __('Lateral derecho')}}</option>
                                        <option value="Mediocampista">{{ __('Mediocampista')}}</option>
                                        <option value="Mediocampista defensivo">{{ __('Mediocampista defensivo')}}</option>
                                        <option value="Mediocampista derecho">{{ __('Mediocampista derecho')}}</option>
                                        <option value="Mediocampista izquierdo">{{ __('Mediocampista izquierdo')}}</option>
                                        <option value="Mediapunta">{{ __('Mediapunta')}}</option>
                                        <option value="Delantero centro">{{ __('Delantero centro')}}</option>
                                        <option value="Extremo izquierdo">{{ __('Extremo izquierdo')}}</option>
                                        <option value="Extremo derecho">{{ __('Extremo derecho')}}</option>
                                </select>
                                @error('posicion')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
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