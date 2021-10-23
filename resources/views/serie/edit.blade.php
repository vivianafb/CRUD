@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/serie/'.$serie->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
        {{ method_field('PATCH') }}
        

<h1>Editar serie</h1>
@if(count($errors)>0)


<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach

    </ul>
</div>


@endif
<div class="form-group">

    <label for="nombre">Nombre:</label>
    <input class="form-control" type="text" name="nombre" 
    value="{{ isset($serie->nombre)?$serie->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">

    <label for="Nombre">precio:</label>
    <input class="form-control" type="text" name="precio" 
    value="{{ isset($serie->precio)?$serie->precio:old('precio') }}" id="precio">

</div>

<div class="form-group">
    <label for="Categoria">Categoria:</label>
    <select class="form-control" name="Categoria" id="Categoria" >
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" @if($categoria->id == $serie->categorias_id ) selected="selected" @endif  >{{ $categoria->nombre }}</option>
        @endforeach
        
    </select>
</div>





<input class="btn btn-success" type="submit" value="Guardar" id="Boton1">
<a class="btn btn-primary" href="{{ url('serie/') }}" id="Boton2"> Atrás</a>
    </form>

</div>
@endsection