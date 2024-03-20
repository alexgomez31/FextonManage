@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'productos')
@section('plugins.SweetAlert2', true)
@section('content_header')

    {{-- <p>Administracion de articulos</p> --}}


@section('content')

  {{-- <h1>Productos</h1> --}}
  <div class="container">
    <div class="tableproduc">
      <h3 class="text-center text-primary"><h1>Lista de productos</h1></h3>
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
              <th scope="col">Soporte</th>
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
                @if($producto->plano)
                    <span class="badge bg-success">PDF asociado</span>
                @else
                    <span class="badge bg-danger">Falta PDF</span>
                @endif
            </td>
              <td>
                
                <a id="mostrarPdf" href="{{ route('productos.show', $producto->id) }}" target="_blank"  class="btn btn-sm btn-primary">Ver PDF</a>
                {{-- <a href="#" class="open-pdf" data-id="{{ $producto->id }}">Abrir PDF</a> --}}

                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <button type="submit" class="btn btn-sm btn-danger delete-product" data-id="{{ $producto->id }}" data-tipoproducto="{{ $producto->tipoproducto }}" data-referencia="{{ $producto->referencia }}">Eliminar</button>

              </td>
            </tr>
            @endforeach       
          </tbody>
          <div id="pdfContainer" style="display: none;">
            <embed id="pdfEmbed" src="#" type="application/pdf" width="100%" height="600px">
          </div>

        </table>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if(session('error'))
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '{{ session('error') }}'
              });
          @endif
      });

      // mostar alerta de actualizacion
      const successMessage = '{{ Session::get('success') }}';
      if (successMessage) {
          setTimeout(function() {
              Swal.fire({
                  title: 'Éxito',
                  text: successMessage,
                  icon: 'success'
              });
          }, 2000); // Esperar 1000 milisegundos (1 segundo) antes de mostrar la alerta
      }
    </script>
  </div>

 

@endsection

