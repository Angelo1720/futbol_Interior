<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Editar jugador histórico') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('historicos.update', $historico->id) }}"
                        class="p-4 border rounded-lg" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label label-custom">{{ __('Nombre') }}</label>
                            <input id="nombre" class="form-control input-custom" type="text" name="nombre"
                                value="{{ $historico->nombre }}" required autofocus autocomplete="nombre" />
                            @error('nombre')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label label-custom">{{ __('Apellido') }}</label>
                            <input id="apellido" class="form-control input-custom" type="text" name="apellido"
                                value="{{ $historico->apellido }}" required autofocus autocomplete="apellido" />
                            @error('apellido')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha nacimiento -->
                        <div class="mb-3">
                            <label for="fechaNacimiento"
                                class="form-label label-custom">{{ __('Fecha de nacimiento') }}</label>
                            <input id="fechaNacimiento" class="form-control input-custom" type="date"
                                name="fechaNacimiento" value="{{ $historico->fechaNacimiento }}" required
                                autocomplete="fechaNacimiento" />
                            @error('fechaNacimiento')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Historia -->
                        <div class="mb-3">
                            <label for="historia" class="form-label label-custom">{{ __('Historia') }}</label>
                            <textarea id="historia" class="form-control input-custom" type="text" name="historia" autofocus
                                autocomplete="historia"> {{ $historico->historia }}</textarea>
                            @error('historia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Imagen del Jugador actual -->
                        @if ($historico->traerPortada() != null)
                            <label for="imageJugador"
                                class="label-custom">{{ __('👇Imágen utilizada actualmente👇') }}</label>
                            <div class="text-center editHistoricoImg">
                                <span class="imagenEditEquipo">
                                    <svg onclick="borrarImagenJHistorico('Historico_{{ $historico->traerPortada()->id }}');"
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                    <img id="imageJugador" class="img-thumbnail"
                                        src="data:image/jpg;base64, 
                                    {{ $historico->traerPortada()->base64 }}"
                                        alt="Imagen de jugador histórico">
                                </span>

                                <input type="hidden" id="Historico_{{ $historico->traerPortada()->id }}"
                                    name="NOborrarImgPortada" value="{{ $historico->traerPortada()->id }}">
                            </div>
                        @endif
                        <!-- Portada -->
                        <div class="mb-3">
                            <label for="imgJugador" class="form-label label-custom">{{ __('Portada') }}</label>
                            <input id="imgJugador" class="form-control input-custom mt-3" type="file"
                                name="imgJugador" autofocus />
                            @error('imgJugador')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
