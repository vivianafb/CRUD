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
    

    <a href="{{ url('serie/create') }}" class="btn btn-success"> Registrar Nueva Serie</a>
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Imagenes</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $series as $serie )
                <tr>
                    <td>{{ $serie->id }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$serie->imagen }}" width="120" alt="">
                    </td>

                    <td>{{ $serie->nombre }}</td>
                    
                    <td>{{ $serie->nombreCategoria->Nombre}}</td>
                    
                    
                    <td>
                        <a href="{{ url('/serie/'.$serie->id.'/edit') }} " class="btn btn-info"> Editar</a>
                        |
                        <form action="{{ url('/serie/'.$serie->id) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar?')" value="Borrar">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection