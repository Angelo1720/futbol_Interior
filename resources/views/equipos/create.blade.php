<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.store') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameEquipo" class="form-label label-custom">{{ __('Nombre equipo') }}</label>
                            <input id="nameEquipo" class="form-control input-custom" type="text" name="nameEquipo"
                                :value="old('nameEquipo')" required autofocus autocomplete="nameEquipo" />
                                @error('nameEquipo')
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
                                :value="old('nameCancha')" required autofocus autocomplete="nameCancha" />
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