<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('campeonatos.store') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="name" class="form-control input-custom" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="division" class="col-form-label label-custom">Division</label>
                                <select name="division" id="division" class="form-select mb-3">
                                    <option value="{{ 'DivA' }}">{{ "Primera 'A'" }}</option>
                                    <option value="{{ 'DivB' }}">{{ "Segunda 'B'" }}</option>
                                    <option value="{{ 'DivC' }}">{{ "Tercera 'C'" }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tipo de campeonato -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="tipoCampeonato" name="tipoCampeonato"
                                value="1">
                            <label class="form-check-label" for="tipoCampeonato">
                                Especial
                            </label>
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
