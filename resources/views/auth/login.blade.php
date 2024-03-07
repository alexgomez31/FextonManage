@extends('plantilla.plantillaLogin')
@section('login')



<div class="container" src="{{ asset('img/log.png') }}">
    <div class="img">
        <img  src="{{ asset('img/log.png') }}"  >
    </div>

    <div class="login-content ">
        <form action="{{ url('/iniciar-sesion/')}}" method="POST">
            @csrf
mi niño puedes modificar de aqui donde me encuentro hasta
            <div class="vansss">

                {{-- <img src="{{ asset('img/escudo.png') }}" style="width: 70%; height: 90%">
                <img src="{{ asset('img/Sena 2023.png') }}" style="width: 70%; height: 90%"> --}}
                {{-- <img src="{{ asset('img/IQNet.png') }}" style="width: 70%; height: 90%">
                <img  class ="peque" src="{{ asset('img/icontec.png') }}" style="width: 70%; height: 90%"> --}}

            </div>
            <br>


            <h2 class="title">INICIAR SESIóN</h2>
            <br>

            <div class="mb-3">
                @if ($errors->has('email'))
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <small>{{ $errors->first('email') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

            </div>


            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Correo</h5>
                    <input type="text" class="input" name="email" value="{{ old('email') }}"
                        title="ingrese su correo">
                </div>
            </div>


            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Contraseña</h5>
                    <input type="password" id="input" class="input" name="password"
                        title="ingrese su contraseña para iniciar">
                </div>

            </div>

            <div class="view">
                <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuerdame') }}</span>
                </label>
            </div>


            <button type="submit" class="btn ">INGRESAR <br>
                <i class="fas fa-sign-in-alt"></i>
            </button>
                <br>
                <br>


            {{-- <div class="vansss2">

            </div> --}}
        </form>
    </div>
</div>





{{--
<x-guest-layout>
    <!-- Session Status -->


    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout> --}}
dejel 
