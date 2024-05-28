<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('ediciones.store') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameEdicion" class="form-label label-custom">{{ __('Nombre edición') }}</label>
                            <input id="nameEdicion" class="form-control input-custom" type="text" name="nameEdicion"
                                :value="old('nameEdicion')" required autofocus autocomplete="nameEdicion" />
                            @error('nameEdicion')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha Inicio -->
                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label label-custom">{{ __('Fecha de inicio') }}</label>
                            <input id="fechaInicio" class="form-control input-custom" type="date" name="fechaInicio"
                                :value="old('fechaInicio')" autocomplete="fechaInicio" />
                            @error('fechaInicio')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha Fin -->
                        <div class="mb-3">
                            <label for="fechaFinal"
                                class="form-label label-custom">{{ __('Fecha de finalización') }}</label>
                            <input id="fechaFinal" class="form-control input-custom" type="date" name="fechaFinal"
                                :value="old('fechaFinal')" autocomplete="fechaFinal" />
                            @error('fechaFinal')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="campeonatoId" value="{{ $campeonatoSeleccionado->id }}">

                        <!-- Bool liguilla -->
                        <div class="mb-3 form-check form-switch">
                            <label for="liguilla"
                                class="form-label form-check-label">{{ __('¿Esta edición es una liguilla?') }}</label>
                            <input id="liguilla" class="form-check-input" type="checkbox" name="liguilla">
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
