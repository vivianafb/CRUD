<h1> {{$modo}} categoria </h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
   
@endif
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre"  class="form-control"
        value="{{ isset($categoria->Nombre)?$categoria->Nombre:old('Nombre') }}" id="Nombre">
    
    </div>

    <div class="form-group">
        <input type="submit" value="{{ $modo }} datos" class="btn btn-success" id="Boton1">
        <a href="{{ url('categoria/') }}" class="btn btn-info" id="Boton2">Atrás</a>
    </div>
