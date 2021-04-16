@extends('layouts.app')

@section('content')

    <section class="carrito">
        <div class="carrito_content container">
            @if (Session::has('mensaje'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <h1>Carrito</h1>
            <div class="carrito_grid">
                <a href="" class="carrito_item" style="text-decoration: none">
                    <div class="carrito_imagen">
                        <img src="img/gambito.jfif" alt="">
                    </div>
                    <div class="carrito_informacion">
                        <p class="carrito_nombre">Nombre</p>

                        <p class="carrito_precio">Precio</p>
                    </div>
                    <div class="carrito_botones">
                        <button class="btn" id="botonCarrito">Eliminar del carrito</button>
                    </div>
                </a>
            </div>
            <div>
                <h3 class="carrito_total">Total: $20.000</h3>
            </div>



        </div>
    </section>
@endsection
