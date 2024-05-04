<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="p-4 border rounded-lg">
        @csrf
        <div class="card card-custom">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label label-custom">{{ __('Nombre') }}</label>
                        <input id="name" class="form-control input-custom" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label label-custom">{{ __('Correo Electrónico') }}</label>
                        <input id="email" class="form-control input-custom" type="email" name="email"
                            :value="old('email')" required autocomplete="username" placeholder="nombre@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label label-custom">{{ __('Contraseña') }}</label>
                        <input id="password" class="form-control input-custom" type="password" name="password" required
                            autocomplete="new-password" />
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path
                                    d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                <path
                                    d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                <path
                                    d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                            </svg>
                        </button>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation"
                            class="form-label label-custom">{{ __('Confirmar Contraseña') }}</label>
                        <input id="password_confirmation" class="form-control input-custom" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-end align-items-center" id="botonesRegister">
                        <a class="btn btn-link me-4" href="{{ route('login') }}">{{ __('Ya está Registrado?') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('Registrarse') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
