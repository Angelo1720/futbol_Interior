<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.update', $equipo->id) }}" class="p-4 border rounded-lg">
                        @csrf
                        @method('PUT')
                        {{-- @dd($equipo); --}}
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label label-custom">{{ __('Nombre equipo') }}</label>
                            <input id="name" class="form-control input-custom" type="text" name="name"
                                value="{{ $equipo->nombre }}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Fecha fundacion -->
                        <div class="mb-3">
                            <label for="fechaFundacion"
                                class="form-label label-custom">{{ __('Correo Electrónico') }}</label>
                            <input id="fechaFundacion" class="form-control input-custom" type="date"
                                name="fechaFundacion" value="{{ $equipo->fechaFundacion }}" required
                                autocomplete="fechaFundacion" />
                            <x-input-error :messages="$errors->get('fechaFundacion')" class="mt-2" />
                        </div>

                        <!-- Nombre cancha -->
                        <div class="mb-3">
                            <label for="nameCancha" class="form-label label-custom">{{ __('Nombre cancha') }}</label>
                            <input id="nameCancha" class="form-control input-custom" type="text" name="nameCancha"
                                value="{{ $equipo->nomCancha == 'NO' ? '' : $equipo->nomCancha }}" autofocus autocomplete="nameCancha"
                                placeholder ="Si queda vacío signfica que NO posee una." />
                            <x-input-error :messages="$errors->get('nameCancha')" class="mt-2" />
                        </div>

                        <!-- Divisional -->
                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="divisional" class="col-form-label label-custom">Divisional</label>
                                <select name="divisional" id="divisional" class="form-select mb-3">
                                    <option value="DivA" {{ $equipo->divisional == 'Primera "A"' ? 'selected' : '' }}>
                                        Primera 'A'</option>
                                    <option value="DivB" {{ $equipo->divisional == 'Segunda "B"' ? 'selected' : '' }}>
                                        Segunda 'B'</option>
                                    <option value="DivC" {{ $equipo->divisional == 'Tercera "C"' ? 'selected' : '' }}>
                                        Tercera 'C'</option>
                                </select>
                            </div>
                        </div>

                        <!-- Cantidad Titulos -->
                        <div class="mb-3">
                            <label for="cantidadTitulos"
                                class="form-label label-custom">{{ __('Cantidad de titulos') }}</label>
                            <input id="cantidadTitulos" class="form-control input-custom" type="text"
                                name="cantidadTitulos" value="{{ $equipo->cantidadTitulos }}" required autofocus
                                autocomplete="cantidadTitulos" />
                            <x-input-error :messages="$errors->get('cantidadTitulos')" class="mt-2" />
                        </div>

                        <!-- Bool participa -->
                        <div class="mb-3 form-check form-switch">
                            <label for="participa"
                                class="form-label label-custom form-check-label">{{ __('¿Actualmente está en competencia?') }}</label>
                            <input id="participa" class="form-check-input" type="checkbox" name="participa"
                                {{ $equipo->participa ? 'checked' : '' }} autofocus autocomplete="participa" />
                            <x-input-error :messages="$errors->get('participa')" class="mt-2" />
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
