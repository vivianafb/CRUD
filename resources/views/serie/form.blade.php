

<h1>{{ $modo }} serie</h1>
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

    <label for="Nombre">Nombre:</label>
    <input class="form-control" type="text" name="Nombre" 
    value="{{ isset($serie->nombre)?$serie->nombre:old('nombre') }}" id="Nombre">

</div>

<div class="form-group">

    <label for="Precio">Precio:</label>
    <input class="form-control" type="text" name="Precio" 
    value="{{ isset($serie->precio)?$serie->precio:old('precio') }}" id="Precio">

</div>

<div class="form-group">
    <label for="Categoria">Categoria:</label>
    <select class="form-control" name="Categoria" id="Categoria" >
        @foreach($categorias->all() as $categoria)
            <option value="{{isset($categoria->id)?$categoria->id:old('id') }}">{{$categoria->Nombre}}</option>
        @endforeach
    </select>
<<<<<<< HEAD
</div>



<div class="form-group">
    <label for="Imagen"></label>
    @if(isset($serie->Imagen))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$serie->imagen }}" width="100" alt="">
    @endif
    <input class="form-control" type="file" name="Imagen" value="" id="Imagen">

=======
>>>>>>> 2679cc3ee61687907b8427a0c4cee385aa674011
</div>
<input class="btn btn-success" type="submit" value="Guardar">
<a class="btn btn-primary" href="{{ url('serie/') }}"> Atrás</a>