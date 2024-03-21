@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'crear producto')

@section('content')

<link rel="stylesheet" href="{{ asset('css/createEmp.css') }}">

{{-- <p>Administracion de articulos</p> --}}

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card m-4">
                <div class="card-header text-center fs-6">
                    <h1>Registrar Empleado</h1>
                </div>

                <div class="card-body" style="overflow-y: auto; max-height: 80vh;">
                    <form action="{{ route('empleado.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="names">Nombre Completo:</label>
                            <input type="text" class="form-control" id="names" name="names" required>
                        </div>
                        <div class="form-group">
                            <label for="documento">Tipo de Documento</label>
                            <select id="documento" class="form-control" name="documento" required>
                                <option value="">Seleccione una opción</option>
                                <option value="Cedula ciudadania">Cedula ciudadania</option>
                                <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                                <option value="Sin identificación">Sin identificación</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numdoc">Número de documento:</label>
                            <input type="text" class="form-control" id="numdoc" name="numdoc" required>
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_ingreso">Fecha de ingreso:</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_fin">Fecha de fin:</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="document_soport">Documento de Identidad (PDF):</label>
                            <input type="file" class="form-control-file" id="document_soport" name="document_soport">
                        </div>
                        <div class="form-group">
                            <label for="contrato_soport">Contrato Laboral (PDF):</label>
                            <input type="file" class="form-control-file" id="contrato_soport" name="contrato_soport">
                        </div>
                        <div class="form-group">
                            <label for="carta_soport">Cartas de Inicio y Fin de Contrato (PDF):</label>
                            <input type="file" class="form-control-file" id="carta_soport" name="carta_soport">
                        </div>
                        <div class="form-group">
                            <label for="otro_si_soport">Otro Si al Contrato Laboral (PDF):</label>
                            <input type="file" class="form-control-file" id="otro_si_soport" name="otro_si_soport">
                        </div>
                        <div class="form-group">
                            <label for="liquidaciones_soport">Liquidaciones(PDF):</label>
                            <input type="file" class="form-control-file" id="liquidaciones_soport" name="liquidaciones_soport">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
