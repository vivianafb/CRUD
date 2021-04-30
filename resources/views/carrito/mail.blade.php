<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
</head>
<body>
    
<h1 style="font-size: 20px; font-family: 'Sans'"> Hola {{ $name }}, Aqui va el detalle de su compra: </h1>

<section class="carrito">
    <div class="carrito_content container">  
        <h1>Series arrendadas: </h1>
        @foreach($detalle_carrito as $detalle)
        <div style="float:left">
            <a href="" class="carrito_item" style="text-decoration: none">
                <img src="https://www.desarrollo.emagenic.cl/crud/public_html/public_html/img/series/{{$detalle->series_id}}.jpg" alt="imagen"  >
            </a>
        </div>

        <div class="carrito_informacion">
            <h3 class="carrito_nombre">{{ $detalle->series->nombre}}</h3>
            <p class="carrito_precio">Precio Unitario: {{ $detalle->series->precio}}</p>
            <p class="carrito_precio">Cantidad: {{ $detalle->cantidad}}</p>
            <p class="carrito_precio">Total: {{ $detalle->precio}}</p>
        </div>
        @endforeach
        
    </div>
</section>

</body>
</html>