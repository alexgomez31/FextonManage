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
        <h1 class="text-center custom-green mt-4">Lista de productos</h1>
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
          </div>
        </div>

        <table id="productos" class="table table-striped table-bordered mt-4">
          <thead class="table-primary">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Tipo de producto </th>
              <th scope="col">Referencia</th>
              <th scope="col">Descripción</th>
              <th scope="col">Altura</th>
              <th scope="col">Numero de ramas</th>
              <th scope="col">Materiales</th>
              <th scope="col">Plano</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody class="table-group-divider" id="tableBody">
            @foreach($productos as $producto)
              <tr>
                <th scope="row">{{ $producto->id }}</th>
                {{-- <td>{{ $producto->tipoproducto }}</td> --}}
                <td>
                  @if(strlen($producto->tipoproducto) > 16)
                      {{ substr($producto->tipoproducto, 0, 15) }}...
                  @else
                      {{ $producto->tipoproducto }}
                  @endif
                </td>
                <td>
                  @if(strlen($producto->referencia) > 12)
                      {{ substr($producto->referencia, 0, 12) }}...
                  @else
                      {{ $producto->referencia }}
                  @endif
                </td>
                <td>
                  @if(strlen($producto->descripcion) > 12)
                      {{ substr($producto->descripcion, 0, 12) }}...
                  @else
                      {{ $producto->descripcion }}
                  @endif
                </td>

                <td>
                  @if(strlen($producto->alto) > 12)
                      {{ substr($producto->alto, 0, 12) }}...
                  @else
                      {{ $producto->alto }}
                  @endif
                </td>
                <td>
                    @if(strlen($producto->ramas) > 12)
                        {{ substr($producto->ramas, 0, 12) }}...
                    @else
                        {{ $producto->ramas }}
                    @endif
                </td>
                <td>
                  @if(strlen($producto->materiales) > 12)
                      {{ substr($producto->materiales, 0, 12) }}...
                  @else
                      {{ $producto->materiales }}
                  @endif
                </td>

                <td>
                  @if($producto->plano)
                      <span class="badge bg-success">PDF asociado</span>
                  @else
                      <span class="badge bg-danger">Falta PDF</span>
                  @endif
                </td>
                <td>
                  @if($producto->plano)
                      <a href="{{ route('productos.show', $producto->id) }}" target="_blank" class="btn btn-sm btn-primary">
                          <i class="fas fa-eye"></i> Ver PDF
                      </a>
                  @else
                      <button class="btn btn-sm btn-warning show-pdf-alert" data-producto-id="{{ $producto->id }}">
                          <i class="fas fa-exclamation-triangle"></i> No hay PDF
                      </button>
                  @endif
                  <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i>
                  </a>
                  <button type="submit" class="btn btn-sm btn-danger delete-product" data-id="{{ $producto->id }}" data-tipoproducto="{{ $producto->tipoproducto }}" data-referencia="{{ $producto->referencia }}">
                      <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="d-flex justify-content-center">
          <!-- Personalizar la paginación -->
          <ul class="pagination">
            <!-- Enlace a la página anterior -->
            <li class="page-item {{ ($productos->currentPage() == 1) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $productos->previousPageUrl() }}">« Atras</a>
            </li>

            <!-- Mostrar los números de página -->
            @for ($i = 1; $i <= $totalPages; $i++)
              <li class="page-item {{ ($productos->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $productos->url($i) }}">{{ $i }}</a>
              </li>
            @endfor

            <!-- Enlace a la página siguiente -->
            <li class="page-item {{ ($productos->currentPage() == $totalPages) ? 'disabled' : '' }}">
              <a class="page-link" href="{{ $productos->nextPageUrl() }}">Siguiente»</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


    {{-- <script>
      $(document).ready(function() {
          $('.show-pdf-alert').click(function() {
              var productoId = $(this).data('producto-id');
              Swal.fire({
                  title: 'Alerta',
                  text: 'No hay plano cargado para este producto.',
                  icon: 'warning',
                  confirmButtonText: 'OK'
              });
          });
      });
    </script> --}}

    <script>
      $(document).ready(function() {
          $('.show-pdf-alert').click(function() {
              var productoId = $(this).data('producto-id');
              Swal.fire({
                  title: 'Alerta',
                  text: 'No hay plano cargado para este producto.',
                  icon: 'warning',
                  confirmButtonText: 'OK'
              });
          });
      });

      const successMessage = '{{ Session::get('success') }}';
      if (successMessage) {
          setTimeout(function() {
              Swal.fire({
                  title: 'Éxito',
                  text: successMessage,
                  icon: 'success'
              });
          }, 1000); 
      }
    </script>
  </div>
@endsection
