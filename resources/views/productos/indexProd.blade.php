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

  <h1>Productos</h1>
  <div class="container">
    <div class="tableproduc">
      <h3 class="text-center text-primary">Lista de productos</h3>
      <div class="tablelist">
        {{-- <button type="submit" href="{{ route('productos.create') }}" class="btn btn-success mb-3">Nuevo</button> --}}
        <div class="container text-center">
          <div class="row justify-content-end">
            <div class="groupp col-3">
              <svg viewBox="0 0 24 24" aria-hidden="true" class="icon">
                <g>
                  <path
                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
                  ></path>
                </g>
              </svg>
              <input class="inputt" type="search" id="searchInput" placeholder="Buscar" />
            </div>

            <div class="">
              <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Nuevo Producto</a>
            </div>

          {{-- <input type="text" id="searchInput" class="form-control mt-3" placeholder="Buscar"> --}}
            
          </div>
        </div>

        <table class="table table-striped table-bordered mt-4">
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
          <tbody class="table-group-divider" id="tableBody">
            @foreach($productos as $producto)
            <tr>
              <th scope="row">{{ $producto->id }}</th>
              <td>{{ $producto->tipoproducto }}</td>
              <td>{{ $producto->referencia }}</td>
              <td>{{ $producto->descripcion }}</td>
              <td>{{ $producto->alto }}</td>
              <td>{{ $producto->ancho }}</td>
              <td>
                {{-- <button type="button" class="delete-button" title="Eliminar">
                  <i class="fas fa-trash-alt"></i>
                </button>

                

                <button type="button" class="view-button" title="Ver">
                  <i class="fas fa-eye"></i>
                </button> --}}

                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <button type="submit" class="btn btn-sm btn-danger delete-product" data-id="{{ $producto->id }}" data-tipoproducto="{{ $producto->tipoproducto }}" data-referencia="{{ $producto->referencia }}">Eliminar</button>

              </td>
            </tr>
            @endforeach       
          </tbody>
        </table>
      </div>
    </div>
  </div>
 

@endsection



