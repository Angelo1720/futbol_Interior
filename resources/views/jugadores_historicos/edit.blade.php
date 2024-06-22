<x-app-layout>
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
                                <div class="text-center editHistoricoImg">
                                    <label for="imageJugador"
                                        class="label-custom">{{ __('👇Imágen utilizada actualmente👇') }}</label>
                                    <img id="imageJugador" class="img-thumbnail"
                                        src="data:image/jpg;base64, 
                                    {{ $historico->traerPortada()->base64 }}"
                                        alt="Imagen de jugador histórico">
                                    <input id="imgJugador" class="form-control input-custom mt-3" type="file"
                                        name="imgJugador" autofocus />
                                    @error('imgJugador')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="d-flex justify-content-end align-items-center mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
