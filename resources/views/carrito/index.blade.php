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
            @foreach($detalle_carrito as $detalle)
            
            <div class="carrito_grid">
                <a href="" class="carrito_item" style="text-decoration: none">
                        <div class="carrito_imagen"  style="background-image: url('{{ asset('public_html/img/series/' . $detalle->series->id . '.jpg') }}'); " ></div>

                    <div class="carrito_informacion">
                        <p class="carrito_nombre">{{ $detalle->series->nombre}}</p>

                        <p class="carrito_precio">Precio Unitario: {{ $detalle->series->precio}}</p>

                        <p class="carrito_precio">Cantidad: {{ $detalle->cantidad}}</p>

                        <p class="carrito_precio">Total: {{ $detalle->precio}}</p>

                        <form action="{{ route('carrito.eliminar',["idSerie" =>$detalle->series_id, "idCarrito" =>$detalle->carritos_id]) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" id="Boton2" onclick="return confirm('¿Desea eliminar?')" value="Borrar">
                        </form>
                    </div>
                </a>
            </div>
            @endforeach
            <div>
                <h3 class="carrito_total">${{$total}}</h3>
            </div>

            <form action="{{route('carrito.mensaje')}}" class="d-inline" method="get">
                
                <input class="btn btn-danger" type="submit" id="Boton2" onclick="return confirm('¿Desea finalizar su compra?')" value="Finalizar Compra">
            </form>

        </div>
    </section>
@endsection
