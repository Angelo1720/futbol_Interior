<x-guest-layout>
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
                    <form method="POST" action="{{ route('register') }}" class="p-4 border rounded-lg">
                        @csrf
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
                                :value="old('email')" required autocomplete="username"
                                placeholder="nombre@example.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label label-custom">{{ __('Contraseña') }}</label>
                            <input id="password" class="form-control input-custom" type="password" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-2">
                            <label for="password_confirmation"
                                class="form-label label-custom">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password_confirmation" class="form-control input-custom" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="d-flex mb-2">
                            <a class="btn btn-link ps-0 pt-0 me-4" id="anchorAuth" href="{{ route('login') }}">{{ __('Ya está Registrado?') }}</a>
                        </div>
                        <div class="d-flex justify-content-center mt-0">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Registrarse') }}</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
