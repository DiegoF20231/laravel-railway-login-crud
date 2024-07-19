@vite('resources/js/product/delete.js')
@section('title', 'Dashboard')
@extends('layouts.layout')
@section('dashboard')
    <x-nav-bar />
    {{-- <h1>Hola {{ Session::get('user')->username }}</h1> --}}
    <x-create-product-modal />
    <main class="container-fluid mt-3 maximo overflow-auto ">



        @if (count($products) > 0)
            <div class="row gap-3 d-flex justify-content-center ">
                @foreach ($products as $product)
                    <div class="col-3 mb-3 rounded-4  card p-3 shadow" style="width: 18rem;">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title ">{{ $product->name }}</h5>
                            <h5 class="card-title "">Precio: {{ $product->price }}</h5>
                            <p class="card-text">Descripcion: {{ $product->description }}</p>
                            <a href="{{ $product->image_url }}" target="blank" class="btn btn-primary an_button">Ver
                                imagen </a>
                            <a class="btn btn-danger mt-3 an_button" id="delete"
                                href="api/product/{{ $product->product_id }}">Eliminar
                                Producto</a>
                            <x-edit-product-modal :product="$product" />

                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <div class="w-100 d-flex justify-content-center align-items-center">
                <p class="d-block">No tienes productos creados, crea uno</p>
                <img src="{{ asset('img/UI-UX design-rafiki.png') }}" style="max-height: 500px;max-width: 450px;">
            </div>
        @endif

        @error('description')
            <div>Error</div>
        @enderror

    </main>

    @if (session('Mensaje'))
        @vite('resources/js/product/success.js')
    @endif

    @if (session('DeleteMessage'))
        @vite('resources/js/product/successDelete.js')
    @endif
@endsection


{{-- https://res.cloudinary.com/dm39uk6at/image/upload/v1721276258/laravel_login_crud/cwown8onadzadnckggyl.png --}}
