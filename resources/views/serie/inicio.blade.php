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

        <form >
            <div class="form-row">
                <div class="col-sm-2">
                    {{-- <input type="text" class="form-control" name="buscarpor" value="{{$buscarpor}}"> --}}
                    <select class="form-control" name="Categoria">
                        @foreach($categorias as $cat)
                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto my-1">
                    <input type="submit" class="btn Boton2" name="" value="Buscar por Categoria">
                </div>
            </div>
        </form>
        <div class="serie__grid">
            @foreach ($series as $serie)

                <a href="" class="serie__item" style="text-decoration: none">
                    <div class="serie__imagen"  style="background-image: url('{{ asset('public_html/img/series/' . $serie->id . '.jpg') }}'); " ></div>
                        {{-- <img src="{{ asset('img/series/' . $serie->id . '.jpg') }}" id="imagenInicio"> --}}
                    
                    <div class="serie__informacion">
                        <p class="serie__categoria">Categorias: {{ $serie->categorias->nombre }}</p>
                        <h1 class="serie__nombre">{{ $serie->nombre }}</h1>
                        <p class="serie__precio"> {{ $serie->precio }}</p>
                        
                        
                        @if(Auth::check())
                        <p style="visibility: hidden">{{$perfil = \Auth::user()->perfil}}</p>
                            @if($perfil == 'Usuario')
                            <form action="{{ route('carrito.store', ["idUsuario"=>Auth::user()->id,"idSerie"=>$serie->id]) }}" method="post" enctype="multipart/form-data" >                                {{ method_field('PUT') }}
                                {{ csrf_field() }}                      
                                    <input class="btn Boton2 btn-block" type="submit" value="Agregar">
                                </form>
                            @else
                                
                            <form action="{{ route('login') }}" method="get" enctype="multipart/form-data" >   
                                                
                                <input class="btn Boton2 btn-block" type="submit" value="Agregar">
                            </form>
                            @endif 
                        @endif
                        
                            
                    </div>
                </a>

            @endforeach
        </div>

    </div>
</section>
@endsection
