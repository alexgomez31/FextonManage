@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'perfil')
@section('content_header')

    {{-- <p>Administracion de articulos</p> --}}

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-4">
                    <div class="card-header text-center fs-6"><h2>Actualizar Producto</h2></div>

                    <div class="card-body">
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Agrega este campo para indicar que estás haciendo una solicitud PUT -->

                            <div class="form-group">
                                <label for="tipoproducto">Tipo de Producto</label>
                                <select id="tipoproducto" class="form-control" name="tipoproducto" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="fexton" @if($producto->tipoproducto == 'fexton') selected @endif>Fexton</option>
                                    <option value="arbol de navidad" @if($producto->tipoproducto == 'arbol de navidad') selected @endif>Árbol de Navidad</option>
                                    <option value="guirnalda" @if($producto->tipoproducto == 'guirnalda') selected @endif>Guirnalda</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input id="referencia" type="text" class="form-control" name="referencia" value="{{ $producto->referencia }}" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">descripcion</label>
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $producto->descripcion }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alto">alto</label>
                                <input id="alto" type="text" class="form-control" name="alto" value="{{ $producto->alto }}" required>
                            </div>
                            <div class="form-group">
                                <label for="ancho">ancho</label>
                                <input id="ancho" type="text" class="form-control" name="ancho" value="{{ $producto->ancho }}" required>
                            </div>
 
                            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>

@endsection
