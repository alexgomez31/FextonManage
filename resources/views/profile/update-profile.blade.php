@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'perfil')

@section('content_header')
    {{-- <p>Administracion de articulos</p> --}}
    <link rel="shortcut icon" href="{{ asset('/img/AdminLTELogo.png') }}" type="image/png">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="containerr">
            <div class="left">
                <div class="encabezado">
                    <h1 class="text-center">Ajustes de Perfil</h1>
                    <p class="mt-2 text-center">{{ __("Actualiza la información del perfil y la dirección de correo electrónico de tu cuenta.") }}</p>
                </div>

                <div class="d-flex justify-content-center">
                    <form id="frmDatos" method="POST" class="form" action="{{ route('profile.updatee') }}">
                        @csrf
                        <div class="formjunt">
                            <input value="{{ Auth::user()->id }}" id="id" name="id" type="text" class="input" hidden>
                            <div class="input-blockk">
                                <input value="{{ Auth::user()->name }}" id="name" name="name" type="text" class="input">
                                <label class="label" for="name">{{ __('Nombre') }}</label>
                            </div>
                            <div class="input-blockk">
                                <input value="{{ Auth::user()->email }}" id="email" name="email" type="email" class="input">
                                <label class="label" for="email">{{ __('Correo electrónico') }}</label>
                            </div>
                            <div class="input-blockk">
                                <input type="password" id="password" name="password" class="input">
                                <label for="password" class="label">Contraseña</label>
                            </div>
                        </div>
                        <button class="button" type="submit">Guardar</button>
                    </form>
                </div>
            </div>

            <div class="right">
                <img src="/img/AdminLTELogo.png" alt="Imagen" class="img">
            </div>
        </div>
    </div>
@endsection
