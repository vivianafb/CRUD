@extends('layouts.app')

@section('content')
<section class="series">
    <div class="serie__content container">   
        @if(Session::has('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif
        
        <h1>Series</h1>
        {{-- <div class="col-3">
        <form class="d-flex float-rigth">
            <input name="buscarpor" class="form-control me-3" type="search" placeholder="Buscar" aria-label="Buscar" value="{{ $buscarpor}}">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div> --}}
        <div class="form-group">
            <label for="Categoria">Categoria:</label>
            <form class="d-flex float-rigth">
            <select name="Categoria" id="Categoria" name= "buscarpor" value="{{$buscarpor}}" >
                @foreach($categorias->all() as $categoria)
                    <option  value="{{isset($categoria->id)}}">{{$categoria->nombre}}</option>
                @endforeach
                
            </select>
            <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            
        </div>
        <div class="serie__grid">
            @foreach ($series as $serie)

                <a href="" class="serie__item" style="text-decoration: none">
                    <div class="serie__imagen"  style="background-image: url('{{ asset('img/series/' . $serie->id . '.jpg') }}'); " ></div>
                        {{-- <img src="{{ asset('img/series/' . $serie->id . '.jpg') }}" id="imagenInicio"> --}}
                    
                    <div class="serie__informacion">
                        <p class="serie__categoria">Categorias: {{ $serie->categorias->nombre }}</p>
                        <h1 class="serie__nombre">{{ $serie->nombre }}</h1>
                        <p class="serie__precio"> {{ $serie->precio }}</p>
                        
                        
                        <form action="{{ route('carrito.agregar',['id'=>$series->id,'user'=>strval(Auth::user()->id)]) }}" method="post" enctype="multipart/form-data" >   
                            {{ method_field('PUT') }}
						{{ csrf_field() }}                      
                            <input class="btn Boton2 btn-block" type="submit" value="Agregar">
                        </form>
                            
                    </div>
                </a>

            @endforeach
        </div>

    </div>
</section>
@endsection
