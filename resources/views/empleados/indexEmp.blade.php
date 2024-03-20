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

@endsection

@section('content')

<h1>Categoria</h1>
<div class="container">
    <div class="tableproduc">
       
        <div class="tablelist">
            <button type="button" class="btn btn-success mb-3">Nuevo</button>
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">1</th>
                        <td>Fexton</td>
                        <td>
                            <button type="button" class="delete-button" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <button type="button" class="update-button" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <button type="button" class="view-button" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Guirnalda</td>
                        <td>
                            <button type="button" class="delete-button" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <button type="button" class="update-button" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <button type="button" class="view-button" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Árbol</td>
                        <td>
                            <button type="button" class="delete-button" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <button type="button" class="update-button" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <button type="button" class="view-button" title="Ver">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
