@extends('adminlte::page')
@extends('plantilla.plantillaDashboard')

@section('title', 'Dashboard')
@section('plugins.SweetAlert2', true)

@section('content_header')

@stop

@section('content')

{{-- links --}}
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="fondo">
    <div class="container1">
        <div class="container-fluid d-flex justify-content-center align-items-end mt-75">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalProductos }}</h3>
                    <strong class="p1">Productos</strong>
                </div>
                <div class="icon">
                    <i class="fas fa-tree"></i>
                </div>
                <a href="{{ route('product.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>

            </div>

            <div class="small-box bg-info ml-3">
                <div class="inner">
                    <h3>{{ $totalEmpleados }}</h3>
                    <strong class="p1">Empleados</strong>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('empleados.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>


<script>
    const successMessage = '{{ Session::get('success') }}';
    if (successMessage) {
        setTimeout(function() {
            Swal.fire({
                title: 'Éxito',
                text: successMessage,
                icon: 'success'
            });
        }, 2000); // Esperar 2000 milisegundos (2 segundos) antes de mostrar la alerta
    }
</script>

@stop
