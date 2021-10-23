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
    

    <a href="{{ url('serie/create') }}" class="btn btn-success" id="Boton1"> Registrar Nueva Serie</a>
<<<<<<< HEAD
=======
    <a href="{{ url('csv/series') }}" class="btn btn-success" id="Boton1"> Exportar CVS</a>

>>>>>>> 2679cc3ee61687907b8427a0c4cee385aa674011
        <br>
        <br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Imagenes</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $series as $serie )
                <tr>
                    <td>{{ $serie->id }}</td>
                    <td>
                        <figure>
                            @php

<<<<<<< HEAD
                        $nombre_fichero = 'img/series/'.$serie->id.'.jpg';
=======
                        $nombre_fichero = 'public_html/img/series/'.$serie->id.'.jpg';
>>>>>>> 2679cc3ee61687907b8427a0c4cee385aa674011
                        if (!(file_exists($nombre_fichero))) {
                            $nombre_fichero = "img/Delete-file-icon.png";
                        }
                        @endphp
                        <img class="img-thumbnail img-fluid" src="{{ asset($nombre_fichero) }}" width="120" alt="">
                        <p><a href="{{ route('serie.imagen',$serie->id) }}">Subir Imágen</a></p>
<<<<<<< HEAD
=======
                    
>>>>>>> 2679cc3ee61687907b8427a0c4cee385aa674011
                        </figure>
                        
                        
                    </td>

                    <td>{{ $serie->nombre }}</td>

                    <td>{{ $serie->precio }}</td>
                    
                    <td>{{ $serie->categorias->nombre }}</td>
                    
                    
                    <td>
                        <a href="{{ route('serie.edit',$serie->id) }} " class="btn btn-info" id="Boton1"> Editar</a>
                        |
                        <form action="{{ url('/serie/'.$serie->id) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" id="Boton2" onclick="return confirm('¿Desea eliminar?')" value="Borrar">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection