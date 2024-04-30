<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.store') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label label-custom">{{ __('Nombre equipo') }}</label>
                            <input id="name" class="form-control input-custom" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Fecha fundacion -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label label-custom">{{ __('Fecha fundación') }}</label>
                            <input id="fecha" class="form-control input-custom" type="fecha" name="fecha"
                                :value="old('fecha')" required autocomplete="fecha" />
                            <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                        </div>

                        <!-- Nombre cancha -->
                        <div class="mb-3">
                            <label for="nameCancha" class="form-label label-custom">{{ __('Nombre cancha') }}</label>
                            <input id="nameCancha" class="form-control input-custom" type="text" name="nameCancha"
                                :value="old('nameCancha')" required autofocus autocomplete="nameCancha" />
                            <x-input-error :messages="$errors->get('nameCancha')" class="mt-2" />
                        </div>

                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="divisional" class="col-form-label label-custom">Divisional</label>
                                <select name="divisional" id="divisional" class="form-select mb-3">
                                        <option value="{{ 1 }}">{{ $divisional->DivA }}</option>
                                        <option value="{{ 2 }}">{{ $divisional->DivB }}</option>
                                        <option value="{{ 3 }}">{{ $divisional->DivC }}</option>
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