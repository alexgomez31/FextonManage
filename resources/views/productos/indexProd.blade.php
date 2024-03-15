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

    <h1>titloe</h1>
    <div class="container">
        <div class="tableproduc">
            <h3 class="text-center text-primary">lista de productos</h3>
            <div class="tablelist">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tipo de producto </th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Altura</th>
                        <th scope="col">Ancho</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                      <tr>
                        <th scope="row">1</th>
                        <td>girnalda</td>
                        <td>rejwi4823</td>
                        <td>es muy bonita</td>
                        <td>1m</td>
                        <td>30cm</td>
                        <td>
                            {{-- <a class="edit-button" method="POST" href="#"
                                title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a> --}}

                            <button type="button" class="delete-button" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>

                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>fexton</td>
                        <td>rejwi4823</td>
                        <td>redondita</td>
                        <td>1m</td>
                        <td>30cm</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>arbol</td>
                        <td>rejwi4823</td>
                        <td>es muy grande/td>
                        <td>1m</td>
                        <td>30cm</td>
                      </tr>
                    </tbody>
                  </table>
            </div>

        </div>
    </div>


    mi amor que atributos tiebe productos

    @endsection
