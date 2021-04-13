@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/serie') }}" method="post" enctype="multipart/form-data">
        @csrf
        
<h1>Registrar serie</h1>
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
    <label for="precio">Precio:</label>
    <input class="form-control" type="text" name="precio" 
    value="{{ isset($serie->precio)?$serie->precio:old('precio') }}" id="precio">
</div>

<div class="form-group">
    <label for="Categoria">Categoria:</label>
    <select class="form-control" name="Categoria" id="Categoria" >
        @foreach($categorias->all() as $categoria)
            <option value="{{isset($categoria->id)?$categoria->id:old('id') }}">{{$categoria->nombre}}</option>
        @endforeach   
    </select>
</div>

<input class="btn btn-success" type="submit" value="Guardar" id="Boton1">
<a  id="Boton2" class="btn btn-primary" href="{{ url('serie/') }}"> Atrás</a>
    </form>
</div>
@endsection