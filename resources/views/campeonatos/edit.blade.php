<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Editar campeonato') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('campeonatos.update', $campeonato->id) }}"
                        class="p-4 border rounded-lg">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameCampeonato" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="nameCampeonato" class="form-control input-custom" type="text" name="nameCampeonato"
                                value="{{ $campeonato->nombre }}" required autofocus autocomplete="nameCampeonato" />
                                @error('nameCampeonato')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="divisional" class="col-form-label label-custom">{{ __('Divisional')}}</label>
                                <select name="divisional" id="divisional" class="form-select mb-3">
                                    <option value="DivA" {{ $campeonato->division == 'Primera "A"' ? 'selected' : '' }}>
                                        Primera 'A'</option>
                                    <option value="DivB" {{ $campeonato->division == 'Segunda "B"' ? 'selected' : '' }}>
                                        Segunda 'B'</option>
                                    <option value="DivC" {{ $campeonato->division == 'Tercera "C"' ? 'selected' : '' }}>
                                        Tercera 'C'</option>
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
