<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Crear usuario') }}
        </h2>
    </x-slot>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.store') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameUsuario" class="form-label label-custom">{{ __('Nombre usuario') }}</label>
                            <input id="nameUsuario" class="form-control input-custom" type="text" name="nameUsuario"
                                :value="old('nameUsuario')" required autofocus autocomplete="nameUsuario" />
                            @error('nameUsuario')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="emailUsuario" class="form-label label-custom">{{ __('Correo Electrónico') }}</label>
                            <input id="emailUsuario" class="form-control input-custom" type="email" name="emailUsuario"
                            :value="old('emailUsuario')" required autocomplete="emailUsuario"
                                placeholder="nombre@example.com" />
                            @error('emailUsuario')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="rol" class="col-form-label label-custom">Rol</label>
                                <select name="rol" id="rol" class="form-select mb-3">
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label label-custom">{{ __('Contraseña') }}</label>
                            <input id="password" class="form-control input-custom" type="password" name="password"
                                required autocomplete="password" />
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation"
                                class="form-label label-custom">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password_confirmation" class="form-control input-custom" type="password"
                                name="password_confirmation" required autocomplete="password_confirmation" />
                                @error('password_confirmation')
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
