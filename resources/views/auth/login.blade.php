<x-guest-layout>
    <!-- Agrega el enlace del favicon aquí -->
    <head>
        <link rel="shortcut icon" href="{{ asset('/img/AdminLTELogo.png') }}" type="image/png">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    </head>

    <div class="container">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Correo Electrónico')" />
                <x-text-input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-text-input id="password" class="input" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar datos') }}</span>
                </label>
            </div>

            <x-primary-button class="ms-3">
                {{ __('INGRESAR') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
