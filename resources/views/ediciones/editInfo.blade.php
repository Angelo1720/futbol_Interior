<x-app-layout>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('ediciones.update', $edicion->id) }}"
                        class="p-4 border rounded-lg">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameEdicion" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="nameEdicion" class="form-control input-custom" type="text" name="nameEdicion"
                                value="{{ $edicion->nombre }}" required autofocus autocomplete="nameEdicion" />
                                @error('nameEdicion')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Fecha inicio -->
                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label label-custom">{{ __('Fecha de inicio') }}</label>
                            <input id="fechaInicio" class="form-control input-custom" type="date" name="fechaInicio"
                                value="{{ $edicion->fechaInicio }}" required autofocus autocomplete="fechaInicio" />
                                @error('fechaInicio')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>
                        
                        <!-- Fecha final -->
                        <div class="mb-3">
                            <label for="fechaFinal" class="form-label label-custom">{{ __('Fecha de final') }}</label>
                            <input id="fechaFinal" class="form-control input-custom" type="date" name="fechaFinal"
                                value="{{ $edicion->fechaFinal }}" required autofocus autocomplete="fechaFinal" />
                                @error('fechaFinal')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
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
