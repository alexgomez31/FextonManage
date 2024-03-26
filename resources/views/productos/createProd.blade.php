@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'crear producto')
@section('content_header')

<link rel="shortcut icon" href="{{ asset('/img/AdminLTELogo.png') }}" type="image/png">

    {{-- <p>Administracion de articulos</p> --}}

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


@section('content')

<link href="{{ asset('css/createProd.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card m-4">
                    <div class="card-header text-center fs-6"><h1>Crear Nuevo Producto</h1></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.store') }}"  enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="form-group">
                                <label for="tipoproducto">Tipo de Producto</label>
                                <input id="tipoproducto" type="text" class="form-control" name="tipoproducto" required>
                            </div> --}}
                            <div class="form-group">
                                <label for="tipoproducto">Tipo de Producto</label>
                                <select id="tipoproducto" class="form-control" name="tipoproducto" required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="fexton">Fexton</option>
                                    <option value="arbol de navidad">Árbol de Navidad</option>
                                    <option value="guirnalda">Guirnalda</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input id="referencia" type="text" class="form-control" name="referencia" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input id="descripcion" type="text" class="form-control" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="alto">Alto</label>
                                <input id="alto" type="text" class="form-control" name="alto" required>
                            </div>
                            <div class="form-group">
                                <label for="ramas">Numero de ramas</label>
                                <input id="ramas" type="text" class="form-control" name="ramas" required>
                            </div>
                            <div class="form-group">
                                <label for="materiales">materiales</label>
                                <input id="materiales" type="text" class="form-control" name="materiales" required>
                            </div>
                            <div class="form-group">
                                <label for="plano">Archivo PDF</label>
                                <input id="plano" type="file" class="form-control-file" name="plano" accept=".pdf">

                            </div>

                            <button type="submit" class="btn btn-success">Crear Producto</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
