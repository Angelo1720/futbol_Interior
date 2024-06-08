<x-app-layout>
    <div class="mt-5">
        <div class="row justify-content-center m-0">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}"
                        class="p-4 border rounded-lg">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameUsuario" class="form-label label-custom">{{ __('Nombre usuario') }}</label>
                            <input id="nameUsuario" class="form-control input-custom" type="text" name="nameUsuario"
                                value="{{ $usuario->name }}" required autofocus autocomplete="nameUsuario" />
                                @error('nameUsuario')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="emailUsuario" class="form-label label-custom">{{ __('Correo Electrónico') }}</label>
                            <input id="emailUsuario" class="form-control input-custom" type="email" name="emailUsuario"
                                value="{{ $usuario->email }}" required autocomplete="emailUsuario" />
                                @error('emailUsuario')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="passwordUsuario" class="form-label label-custom">{{ __('Contraseña') }}</label>
                            <input id="passwordUsuario" class="form-control input-custom" type="password" name="passwordUsuario"
                                autocomplete="passwordUsuario"
                                placeholder="Deje en blanco para mantener la contraseña actual." />
                            @error('passwordUsuario')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmationUsuario"
                                class="form-label label-custom">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password_confirmationUsuario" class="form-control input-custom" type="password"
                                name="password_confirmationUsuario" autocomplete="password_confirmationUsuario"
                                placeholder="Deje en blanco para mantener la contraseña actual." />
                                @error('password_confirmationUsuario')
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
