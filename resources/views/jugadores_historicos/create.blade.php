<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Crear jugador histórico') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{route('historicos.store')}}" class="p-4 border rounded-lg" enctype="multipart/form-data">
                        @csrf
                     
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="nombre" class="form-control input-custom" type="text" name="nombre"
                                :value="old('nombre')" required autofocus autocomplete="nombre" />
                            @error('nombre')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label label-custom">{{ __('Apellido') }}</label>
                            <input id="apellido" class="form-control input-custom" type="text" name="apellido"
                                :value="old('apellido')" required autofocus autocomplete="apellido" />
                            @error('apellido')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha nacimiento -->
                        <div class="mb-3">
                            <label for="fechaNacimiento"
                                class="form-label label-custom">{{ __('Fecha de nacimiento') }}</label>
                            <input id="fechaNacimiento" class="form-control input-custom" type="date"
                                name="fechaNacimiento" :value="old('fechaNacimiento')" required
                                autocomplete="fechaNacimiento" />
                            @error('fechaNacimiento')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Historia -->
                        <div class="mb-3">
                            <label for="historia" class="form-label label-custom">{{ __('Historia') }}</label>
                            <textarea id="historia" class="form-control input-custom" type="text" name="historia"
                            :value="old('historia')" autofocus autocomplete="historia"> </textarea>
                            @error('historia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Imagen del Jugador -->
                        <div class="mb-3">
                            <label for="imgJugador"
                                class="form-label label-custom">{{ __('Portada del Jugador') }}</label>
                            <input id="imgJugador" class="form-control input-custom" type="file" name="imgJugador"
                                autofocus />
                            @error('imgJugador')
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
