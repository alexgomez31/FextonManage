<x-guest-layout>
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <head>
                <link href="{{ asset('css/login.css') }}" rel="stylesheet">
            </head>
            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="input" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                <x-text-input id="password_confirmation" class="input" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Ya está registrado?') }}
                </a>

                <x-primary-button class="login-button ms-4">
                    {{ __('Continuar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
