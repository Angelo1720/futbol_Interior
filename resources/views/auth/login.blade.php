<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="rounded-div row w-50 justify-content-center">
                    <div class="col-auto">
                        <img src="{{ asset('Images/futbol-InteriorV1.png') }}" alt="Logo de Mi Sitio Web" width="250"
                            height="250">
                    </div>
                </div>
                <div class="card-body bg-white col-6">
                    <form method="POST" action="{{ route('login') }}" class="p-4 border rounded-lg">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label label-custom">{{ __('Correo Electrónico') }}</label>
                            <input id="email" class="form-control input-custom" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label label-custom">{{ __('Contraseña') }}</label>
                            <input id="password" class="form-control input-custom" type="password" name="password"
                                required autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me">{{ __('Recordar Credenciales') }}</label>
                        </div>

                        <div class="justify-content-end align-items-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link me-3"
                                    href="{{ route('password.request') }}">{{ __('Olvidaste tu contraseña?') }}</a>
                            @endif

                            <button type="submit" class="btn btn-primary w-50">{{ __('Iniciar Sesión') }}</button>
                            <a class="btn btn-outline-secondary ms-3 m-3"
                                href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
