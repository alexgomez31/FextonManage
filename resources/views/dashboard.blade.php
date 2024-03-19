
@extends('adminlte::page')
@extends('plantilla.plantillaProfile')
@section('title', 'Dashboard')
@section('plugins.SweetAlert2', true)

@section('content_header')
    {{-- <h1>Fexton</h1> --}}


@section('content')
<div class="d-flex justify-content-center">
    <div class="small-box bg-info">
        <div class="inner">
        <h3>150</h3>
        <p>Productos</p>
        </div>
        <div class="icon">
        <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="{{route('product.index')}}" class="small-box-footer">
        Mas informacion <i class="fas fa-arrow-circle-right" ></i>
        </a>
    </div>
    <div class="info-box bg-success ml-4">
        <span class="info-box-icon"><i class="far fa-flag"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Bookmarks</span>
          <span class="info-box-number">410</span>
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
        }, 2000); // Esperar 1000 milisegundos (1 segundo) antes de mostrar la alerta
    }
  </script>




@stop

