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
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                    <path
                                        d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                </svg>
                            </button>
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
