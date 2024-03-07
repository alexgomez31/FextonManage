<x-guest-layout style="background-image: url('{{ asset('ruta/de/tu/imagen.jpg') }}'); background-size: cover;">
    <div class="container">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf

            <head>
                <link href="{{ asset('css/login.css') }}" rel="stylesheet">
            </head>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Usuario ')" />
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

            <div class="form-group flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('¿Olviaste tu contraseña?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Continuar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
