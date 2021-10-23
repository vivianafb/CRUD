@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($series as $serie)
            <div class="col-3">
                <div class="border">
                        <img src="{{ asset('img/series/' . $serie->id . '.jpg') }}" class="img-thumbnail" id="imagenInicio" >
                        <p id="TituloInicio">{{ $serie->nombre }}</p>
                        <p id="PrecioInicio">{{ $serie->precio }}</p>
                        <p id="CategoriasInicio">{{ $serie->categorias->nombre }}</p>
                        <button id='BotonArrendar'>Arrendar</button>
                        
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
@endsection
