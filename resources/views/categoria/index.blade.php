@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

<a href="{{ url('categoria/create') }}" class="btn btn-success">Registrar Categoria</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $categorias as $categoria)
        <tr>
            <td>{{  $categoria->id }}</td>
            <td>{{  $categoria->Nombre }}</td>
            <td> 
                <a href="{{ url('/categoria/'.$categoria->id.'/edit' )}}"class="btn btn-info" >Editar</a>

                <form action="{{  url('/categoria/'.$categoria->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form> 
            </td>
        </tr>
        @endforeach
        
    </tbody>

</table>
</div>
@endsection