@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'editar product')
@section('plugins.SweetAlert2', true)
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
                        <form method="POST" action="{{ route('empleados.update', ['empleado' => $empleado->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
    
                            <!-- Nombres -->
                            <div class="form-group">
                                <label for="names">Nombres</label>
                                <input id="names" type="text" class="form-control" name="names" value="{{ old('names', $empleado->names) }}" required>
                            </div>
    
                            <!-- Documento -->
                            <div class="form-group">
                                <label for="documento">Documento</label>
                                <input id="documento" type="text" class="form-control" name="documento" value="{{ old('documento', $empleado->documento) }}" required>
                            </div>
    
                            <!-- Número de Documento -->
                            <div class="form-group">
                                <label for="numdoc">Número de Documento</label>
                                <input id="numdoc" type="text" class="form-control" name="numdoc" value="{{ old('numdoc', $empleado->numdoc) }}" required>
                            </div>
    
                            <!-- Cargo -->
                            <div class="form-group">
                                <label for="cargo">Cargo</label>
                                <input id="cargo" type="text" class="form-control" name="cargo" value="{{ old('cargo', $empleado->cargo) }}" required>
                            </div>
    
                            <!-- Fecha de Ingreso -->
                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso</label>
                                <input id="fecha_ingreso" type="date" class="form-control" name="fecha_ingreso" value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}" required>
                            </div>
    
                            <!-- Fecha Fin -->
                            <div class="form-group">
                                <label for="fecha_fin">Fecha Fin</label>
                                <input id="fecha_fin" type="date" class="form-control" name="fecha_fin" value="{{ old('fecha_fin', $empleado->fecha_fin) }}" required>
                            </div>
    
                            <!-- Nacionalidad -->
                            <div class="form-group">
                                <label for="nacionalidad">Nacionalidad</label>
                                <input id="nacionalidad" type="text" class="form-control" name="nacionalidad" value="{{ old('nacionalidad', $empleado->nacionalidad) }}" required>
                            </div>
    
                            <!-- Ciudad -->
                            <div class="form-group">
                                <label for="ciudad">Ciudad</label>
                                <input id="ciudad" type="text" class="form-control" name="ciudad" value="{{ old('ciudad', $empleado->ciudad) }}" required>
                            </div>
    
                            <!-- Dirección -->
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion', $empleado->direccion) }}" required>
                            </div>
    
                            <!-- Teléfono -->
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono', $empleado->telefono) }}" required>
                            </div>
    
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $empleado->email) }}" required>
                            </div>
    
                            <!-- Documento de Soporte -->
                            <div class="form-group">
                                <label for="document_soport">Documento de Soporte (PDF)</label>
                                <input id="document_soport" type="file" class="form-control-file" name="document_soport">
                            </div>
    
                            <!-- Contrato de Soporte -->
                            <div class="form-group">
                                <label for="contrato_soport">Contrato de Soporte (PDF)</label>
                                <input id="contrato_soport" type="file" class="form-control-file" name="contrato_soport">
                            </div>
    
                            <!-- Carta de Soporte -->
                            <div class="form-group">
                                <label for="carta_soport">Carta de Soporte (PDF)</label>
                                <input id="carta_soport" type="file" class="form-control-file" name="carta_soport">
                            </div>
    
                            <!-- Otro Si de Soporte -->
                            <div class="form-group">
                                <label for="otro_si_soport">Otro Si de Soporte (PDF)</label>
                                <input id="otro_si_soport" type="file" class="form-control-file" name="otro_si_soport">
                            </div>
    
                            <!-- Liquidaciones de Soporte -->
                            <div class="form-group">
                                <label for="liquidaciones_soport">Liquidaciones de Soporte (PDF)</label>
                                <input id="liquidaciones_soport" type="file" class="form-control-file" name="liquidaciones_soport">
                            </div>
    
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop