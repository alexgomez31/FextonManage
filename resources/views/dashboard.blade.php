{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenido") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

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




@stop
