<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Mi perfil') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 d-flex flex-row justify-content-center w-100">
            <div class="p-4 sm:p-8 bg-primary-subtle shadow sm:rounded-lg divActualizarContraseña w-50">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-primary-subtle shadow sm:rounded-lg divActualizarContraseña w-50">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

            <div class="p-4 sm:p-8 bg-danger-subtle shadow sm:rounded-lg divBorrarCuenta">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
    </div>
</x-app-layout>
