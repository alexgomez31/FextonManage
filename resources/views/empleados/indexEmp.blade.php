@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'empleados')
@section('plugins.SweetAlert2', true)
@section('content_header')

    {{-- <p>Administracion de articulos</p> --}}


@section('content')

  {{-- <h1>empleados</h1> --}}
  <div class="container">
    <div class="tableproduc">
      <h1 class="text-center text-primary mt-4">Empleados</h1>
      <div class="tablelist">
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
              <a href="{{route('empleados.create')}}" class="btn btn-success">Registrar Empleado</a>
            </div>

          {{-- <input type="text" id="searchInput" class="form-control mt-3" placeholder="Buscar"> --}}

          </div>
        </div>

        <div class="table-responsive"> <!-- Agregar la clase table-responsive -->
          <table id="empleados" class="table table-striped table-bordered mt-4">
            <thead class="table-primary">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombres apellidos</th>
                <th scope="col">Documento</th>
                <th scope="col">N° documento</th>
                <th scope="col">Cargo</th>
                <th scope="col">Fecha ing</th>
                <th scope="col">Fecha fin</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Documento soport</th>
                <th scope="col">Contrato soporte</th>
                <th scope="col">Carta soporte</th>
                <th scope="col">Otro si soporte</th>
                <th scope="col">Liquidaciones</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
          <tbody class="table-group-divider" id="tableBody">
            @foreach($empleados as $empleado)
            <tr>
              <th scope="row">{{ $empleado->id }}</th>
              {{-- <td>{{ $empleado->tipoempleado }}</td> --}}
              <td>
                @if(strlen($empleado->names) > 16)
                    {{ substr($empleado->names, 0, 15) }}...
                @else
                    {{ $empleado->names }}
                @endif
            </td>
              <td>
                @if(strlen($empleado->documento) > 12)
                    {{ substr($empleado->documento, 0, 12) }}...
                @else
                    {{ $empleado->documento }}
                @endif
              </td>
              <td>
                @if(strlen($empleado->numdoc) > 12)
                    {{ substr($empleado->numdoc, 0, 12) }}...
                @else
                    {{ $empleado->numdoc }}
                @endif
              </td>

              <td>
                @if(strlen($empleado->cargo) > 12)
                    {{ substr($empleado->cargo, 0, 12) }}...
                @else
                    {{ $empleado->cargo }}
                @endif
              </td>

              <td>
                  @if(strlen($empleado->fecha_ingreso) > 12)
                      {{ substr($empleado->fecha_ingreso, 0, 12) }}...
                  @else
                      {{ $empleado->fecha_ingreso }}
                  @endif
              </td>
              <td>
                @if(strlen($empleado->fecha_fin) > 12)
                    {{ substr($empleado->fecha_fin, 0, 12) }}...
                @else
                    {{ $empleado->fecha_fin }}
                @endif
                </td>
                <td>
                    @if(strlen($empleado->nacionalidad) > 12)
                        {{ substr($empleado->nacionalidad, 0, 12) }}...
                    @else
                        {{ $empleado->nacionalidad }}
                    @endif
                </td>
                <td>
                    @if(strlen($empleado->ciudad) > 12)
                        {{ substr($empleado->ciudad, 0, 12) }}...
                    @else
                        {{ $empleado->ciudad }}
                    @endif
                </td>
                <td>
                    @if(strlen($empleado->direccion) > 12)
                        {{ substr($empleado->direccion, 0, 12) }}...
                    @else
                        {{ $empleado->direccion }}
                    @endif
                </td>
                <td>
                    @if(strlen($empleado->telefono) > 12)
                        {{ substr($empleado->telefono, 0, 12) }}...
                    @else
                        {{ $empleado->telefono }}
                    @endif
                </td>
                <td>
                    @if(strlen($empleado->email) > 12)
                        {{ substr($empleado->email, 0, 12) }}...
                    @else
                        {{ $empleado->email }}
                    @endif
                </td>

              <td>
                @if($empleado->document_soport)
                    <span class="badge bg-success">PDF asociado</span>
                @else
                    <span class="badge bg-danger">Falta PDF</span>
                @endif
              </td>
              <td>
                @if($empleado->contrato_soport)
                    <span class="badge bg-success">PDF asociado</span>
                @else
                    <span class="badge bg-danger">Falta PDF</span>
                @endif
              </td>
              <td>
                @if($empleado->carta_soport)
                    <span class="badge bg-success">PDF asociado</span>
                @else
                    <span class="badge bg-danger">Falta PDF</span>
                @endif
              </td>
              <td>
                @if($empleado->otro_si_soport)
                    <span class="badge bg-success">PDF asociado</span>
                @else
                    <span class="badge bg-danger">Falta PDF</span>
                @endif
              </td>
              <td>
                @if($empleado->liquidaciones_soport)
                    <span class="badge bg-success">PDF asociado</span>
                @else
                    <span class="badge bg-danger">Falta PDF</span>
                @endif
                </td>
              <td>

                {{-- <a id="mostrarPdf" href="#" target="_blank" class="btn btn-sm btn-primary">
                    <i class="fas fa-eye"></i>
                </a> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verEmpleadoModal{{ $empleado->id }}">



                {{-- <a href="#" class="open-pdf" data-id="{{ $empleado->id }}">Abrir PDF</a> --}}

                <a href="#" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                </a>

                <td>
                    <a href="{{ route('empleados.edit', ['empleado' => $empleado->id]) }}" class="btn btn-primary">Editar</a>
                </td>
                <button type="submit" class="btn btn-sm btn-danger delete-product" >
                    <i class="fas fa-trash-alt"></i>
                </button>


              </td>
            </tr>
            @endforeach
          </tbody>

        </table>

        {{-- <div class="d-flex justify-content-center">

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
      </div> --}}
      </div>
    </div>

    {{-- modal --}}
@foreach ($empleados as $empleado)
<!-- Modal para ver detalles del empleado -->
<div class="modal fade" id="verEmpleadoModal{{ $empleado->id }}" tabindex="-1" role="dialog" aria-labelledby="verEmpleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verEmpleadoModalLabel">Detalles del Empleado - {{ $empleado->names }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Documento:</strong> {{ $empleado->documento }}</p>
                <p><strong>Número de Documento:</strong> {{ $empleado->numdoc }}</p>
                <!-- Agrega más detalles según tus necesidades -->

                <!-- Botones para ver los PDF asociados -->
                <div class="modal-body">
                    <p><strong>Documento:</strong> {{ $empleado->documento }}</p>
                    <!-- Agrega más detalles según tus necesidades -->

                    <!-- Listar todos los tipos de soporte disponibles -->
                    <div>
                        <p><strong>Document Soport:</strong>
                            @if ($empleado->document_soport)
                                <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'document_soport')">Ver PDF</button>
                            @else
                                Soporte no asociado
                            @endif
                        </p>
                    </div>
                    <div>
                        <p><strong>Contrato Soport:</strong>
                            @if ($empleado->contrato_soport)
                                <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'contrato_soport')">Ver PDF</button>
                            @else
                                Soporte no asociado
                            @endif
                        </p>
                    </div>
                    <div>
                        <p><strong>Otro Si Soport:</strong>
                            @if ($empleado->otro_si_soport)
                                <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'otro_si_soport')">Ver PDF</button>
                            @else
                                Soporte no asociado
                            @endif
                        </p>
                    </div>
                    <div>
                        <p><strong>Liquidaciones Soport:</strong>
                            @if ($empleado->liquidaciones_soport)
                                <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'liquidaciones_soport')">Ver PDF</button>
                            @else
                                Soporte no asociado
                            @endif
                        </p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach


    <script>
        function mostrarPdf(id, tipoSoporte) {
        // Redireccionar a la ruta para mostrar el PDF correspondiente al tipo de soporte
        window.open('/empleados/showPdf/' + id + '/' + tipoSoporte, '_blank');
    }


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
          }, 1000); // Esperar 1000 milisegundos (1 segundo) antes de mostrar la alerta
      }
    </script>
  </div>
@endsection




