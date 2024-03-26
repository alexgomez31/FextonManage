@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'empleados')
@section('plugins.SweetAlert2', true)
@section('content_header')



<link rel="stylesheet" href="{{ asset('css/indexEmp.css') }}">
    {{-- <p>Administracion de articulos</p> --}}


@section('content')

  {{-- <h1>empleados</h1> --}}
    <div class="container">
        <div class="tableproduc">
            <h1 class="text-center text-primary-green">Empleados</h1>
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
                            <input class="inputt" type="search" id="searchInputEmp" placeholder="Buscar" />
                        </div>
                        <div class="">
                            <a href="{{route('empleados.create')}}" class="btn btn-success">Registrar Empleado</a>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table id="empleados" class="table table-striped table-bordered mt-4">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Documento</th>
                            <th scope="col">N° documento</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Fecha inicio</th>
                            <th scope="col">Fecha fin</th>
                            <th scope="col">Nacionalidad</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Documento Identidad</th>
                            <th scope="col">Contrato Laboral</th>
                            <th scope="col">Cartas Contrato</th>
                            <th scope="col">Otro si al Contrato </th>
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
                                        <span class="badge bg-success"><i class="fas fa-file-pdf"></i> PDF Agregado</span>

                                        @else
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Falta PDF</span>

                                        @endif
                                    </td>
                                    <td>
                                        @if($empleado->contrato_soport)
                                        <span class="badge bg-success"><i class="fas fa-file-pdf"></i> PDF Agregado</span>
                                        @else
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Falta PDF</span>

                                        @endif
                                    </td>
                                    <td>
                                        @if($empleado->carta_soport)
                                        <span class="badge bg-success"><i class="fas fa-file-pdf"></i> PDF Agregado</span>
                                        @else
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Falta PDF</span>

                                        @endif
                                    </td>
                                    <td>
                                        @if($empleado->otro_si_soport)
                                        <span class="badge bg-success"><i class="fas fa-file-pdf"></i> PDF Agregado</span>
                                        @else
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Falta PDF</span>

                                        @endif
                                    </td>
                                    <td>
                                        @if($empleado->liquidaciones_soport)
                                        <span class="badge bg-success"><i class="fas fa-file-pdf"></i> PDF Agregado</span>
                                        @else
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Falta PDF</span>

                                        @endif
                                    </td>

                                    <td>
                                        <div class="button-container">
                                            <button type="button" class="btn1 btn-primary" data-toggle="modal" data-target="#verEmpleadoModal{{ $empleado->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <a href="{{ route('empleados.edit', ['empleado' => $empleado->id]) }}" class="btn1 btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- <button type="submit" class="btn btn-sm btn-danger delete-product">
                                                <i class="fas fa-trash-alt"></i>
                                            </button> --}}
                                            <button class="btn1 btn-danger delete-empleadoo" data-id="{{ $empleado->id }}" data-names="{{ $empleado->names }}" data-numdoc="{{ $empleado->numdoc }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="d-flex justify-content-center">

                        <!-- Personalizar la paginación -->
                        <ul class="pagination">
                          <!-- Enlace a la página anterior -->
                          <li class="page-item {{ ($empleados->currentPage() == 1) ? 'disabled' : '' }}">
                              <a class="page-link" href="{{ $empleados->previousPageUrl() }}">« Atras</a>
                          </li>

                          <!-- Mostrar los números de página -->
                          @for ($i = 1; $i <= $totalPages; $i++)
                          <li class="page-item {{ ($empleados->currentPage() == $i) ? 'active' : '' }}">
                              <a class="page-link" href="{{ $empleados->url($i) }}">{{ $i }}</a>
                          </li>
                          @endfor

                            <!-- Enlace a la página siguiente -->
                          <li class="page-item {{ ($empleados->currentPage() == $totalPages) ? 'disabled' : '' }}">
                              <a class="page-link" href="{{ $empleados->nextPageUrl() }}">Siguiente»</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    @foreach ($empleados as $empleado)
        <!-- Modal para ver detalles del empleado -->
        <div class="modal fade" id="verEmpleadoModal{{ $empleado->id }}" tabindex="-1" role="dialog" aria-labelledby="verEmpleadoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="verEmpleadoModalLabel">Detalles del Empleado - {{ $empleado->names }}</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Id:</strong> {{ $empleado->id }}</p>
                        <p><strong>Documento:</strong> {{ $empleado->documento }}</p>
                        <p><strong>Número de Documento:</strong> {{ $empleado->numdoc }}</p>
                        <p><strong>Telefono</strong> {{ $empleado->telefono }}</p>
                        <p><strong>Email:</strong> {{ $empleado->email }}</p>
                        <p><strong>Dirección:</strong> {{ $empleado->direccion }}</p>
                        <p><strong>Nacionalidad:</strong> {{ $empleado->nacionalidad }}</p>
                        <p><strong>Cargo:</strong> {{ $empleado->cargo }}</p>
                        <p><strong>Fecha Inicio:</strong> {{ $empleado->fecha_ingreso }}</p>
                        <p><strong>Fecha Fin:</strong> {{ $empleado->fecha_fin }}</p>
                        <p><strong>Ciudad:</strong> {{ $empleado->ciudad }}</p>


                        <!-- Botones para ver los PDF asociados -->
                        <div class="modal-body">
                            {{-- <p><strong>Documento:</strong> {{ $empleado->documento }}</p> --}}
                            <!-- Agrega más detalles según tus necesidades -->

                            <!-- Listar todos los tipos de soporte disponibles -->
                            <div class="btn-container">
                                <div class="btn-wrapper">
                                    @if ($empleado->document_soport)
                                        <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'document_soport')">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @else
                                        <button class="btn btn-primary disabled">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @endif
                                    <p>Documento De Identidad</p>
                                </div>
                                <div class="btn-wrapper">
                                    @if ($empleado->contrato_soport)
                                        <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'contrato_soport')">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @else
                                        <button class="btn btn-primary disabled">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @endif
                                    <p>Contrato Laboral</p>
                                </div>
                                <div class="btn-wrapper">
                                    @if ($empleado->carta_soport)
                                        <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'carta_soport')">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @else
                                        <button class="btn btn-primary disabled">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @endif
                                    <p>Cartas de Inicio y Fin de Contrato</p>
                                </div>
                                <div class="btn-wrapper">
                                    @if ($empleado->otro_si_soport)
                                        <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'otro_si_soport')">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @else
                                        <button class="btn btn-primary disabled">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @endif
                                    <p>Otro Si al contrato Laboral</p>
                                </div>
                                <div class="btn-wrapper">
                                    @if ($empleado->liquidaciones_soport)
                                        <button class="btn btn-primary" onclick="mostrarPdf('{{ $empleado->id }}', 'liquidaciones_soport')">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @else
                                        <button class="btn btn-primary disabled">
                                            <i class="fas fa-file-pdf"></i> <!-- Icono de PDF -->
                                        </button>
                                    @endif
                                    <p>Liquidaciones</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                        </div>
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




@endsection

