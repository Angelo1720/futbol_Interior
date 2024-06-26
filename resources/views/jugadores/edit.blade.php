<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Editar jugador') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('jugadores.update', $jugador->id) }}"
                        class="p-4 border rounded-lg">
                        @csrf
                        @method('PUT')
                        <!-- nombre -->
                        <div class="mb-3">
                            <label for="nameJugador" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="nameJugador" class="form-control input-custom" type="text" name="nameJugador"
                                value="{{ $jugador->nombre }}" required autofocus autocomplete="nameJugador" />
                            @error('nameJugador')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- apellido -->
                        <div class="mb-3">
                            <label for="apellidoJugador" class="form-label label-custom">{{ __('Apellido') }}</label>
                            <input id="apellidoJugador" class="form-control input-custom" type="text"
                                name="apellidoJugador" value="{{ $jugador->apellido }}" required autofocus
                                autocomplete="apellidoJugador" />
                            @error('apellidoJugador')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha de nacimiento -->
                        <div class="mb-3">
                            <label for="fechaNacimiento"
                                class="form-label label-custom">{{ __('Fecha de nacimiento') }}</label>
                            <input id="fechaNacimiento" class="form-control input-custom" type="date"
                                name="fechaNacimiento" value="{{ $jugador->fechaNacimiento }}" required
                                autocomplete="fechaNacimiento" />
                            @error('fechaNacimiento')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="posicion" class="col-form-label label-custom"> {{ __('Posición') }} </label>
                                <select name="posicion" id="posicion" class="form-select mb-3">
                                    <option value="Arquero" {{ $jugador->posicion == 'Arquero' ? 'selected' : '' }}>{{ __('Arquero') }}</option>
                                    <option value="Defensa central" {{ $jugador->posicion == 'Defensa central' ? 'selected' : '' }}>{{ __('Defensa central') }}</option>
                                    <option value="Lateral izquierdo" {{ $jugador->posicion == 'Lateral izquierdo' ? 'selected' : '' }}>{{ __('Lateral izquierdo') }}</option>
                                    <option value="Lateral derecho" {{ $jugador->posicion == 'Lateral derecho' ? 'selected' : '' }}>{{ __('Lateral derecho') }}</option>
                                    <option value="Mediocampista" {{ $jugador->posicion == 'Mediocampista' ? 'selected' : '' }}>{{ __('Mediocampista') }}</option>
                                    <option value="Mediocampista defensivo" {{ $jugador->posicion == 'Mediocampista defensivo' ? 'selected' : '' }}>{{ __('Mediocampista defensivo') }}
                                    </option>
                                    <option value="Mediocampista derecho" {{ $jugador->posicion == 'Mediocampista derecho' ? 'selected' : '' }}>{{ __('Mediocampista derecho') }}</option>
                                    <option value="Mediocampista izquierdo" {{ $jugador->posicion == 'Mediocampista izquierdo' ? 'selected' : '' }}>{{ __('Mediocampista izquierdo') }}
                                    </option>
                                    <option value="Mediapunta" {{ $jugador->posicion == 'Mediapunta' ? 'selected' : '' }}>{{ __('Mediapunta') }}</option>
                                    <option value="Delantero centro" {{ $jugador->posicion == 'Delantero centro' ? 'selected' : '' }}>{{ __('Delantero centro') }}</option>
                                    <option value="Extremo izquierdo" {{ $jugador->posicion == 'Extremo izquierdo' ? 'selected' : '' }}>{{ __('Extremo izquierdo') }}</option>
                                    <option value="Extremo derecho" {{ $jugador->posicion == 'Extremo derecho   ' ? 'selected' : '' }}>{{ __('Extremo derecho') }}</option>
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
