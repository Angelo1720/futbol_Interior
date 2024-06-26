<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Crear equipo') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.store') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- nombreCorto -->
                        <div class="mb-3">
                            <label for="nameEquipoCorto" class="form-label label-custom">{{ __('Nombre corto de equipo') }}</label>
                            <input id="nameEquipoCorto" class="form-control input-custom" type="text" name="nameEquipoCorto"
                                :value="old('nameEquipoCorto')" required autofocus autocomplete="nameEquipoCorto" 
                                placeholder="Ej: Litoral" />
                                @error('nameEquipoCorto')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- nombre completo -->
                        <div class="mb-3">
                            <label for="nameEquipoLargo" class="form-label label-custom">{{ __('Nombre largo de equipo') }}</label>
                            <input id="nameEquipoLargo" class="form-control input-custom" type="text" name="nameEquipoLargo"
                                :value="old('nameEquipoLargo')" required autofocus autocomplete="nameEquipoLargo" 
                                placeholder="Club Atlético Litoral" />
                                @error('nameEquipoLargo')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Fecha fundacion -->
                        <div class="mb-3">
                            <label for="fechaFundacion" class="form-label label-custom">{{ __('Fecha de fundación') }}</label>
                            <input id="fechaFundacion" class="form-control input-custom" type="date" name="fechaFundacion"
                                :value="old('fechaFundacion')" required autocomplete="fechaFundacion" />
                                @error('fechaFundacion')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Nombre cancha -->
                        <div class="mb-3">
                            <label for="nameCancha" class="form-label label-custom">{{ __('Nombre cancha') }}</label>
                            <input id="nameCancha" class="form-control input-custom" type="text" name="nameCancha"
                                :value="old('nameCancha')" autofocus autocomplete="nameCancha" />
                                @error('nameCancha')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="divisional" class="col-form-label label-custom">Divisional</label>
                                <select name="divisional" id="divisional" class="form-select mb-3">
                                        <option value="{{ "DivA" }}">{{ "Primera 'A'" }}</option>
                                        <option value="{{ "DivB" }}">{{ "Segunda 'B'"}}</option>
                                        <option value="{{ "DivC" }}">{{ "Tercera 'C'" }}</option>
                                </select>
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