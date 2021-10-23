@extends('layouts.app')

@section('content')
	<section>
			<div class="container">
				<h2 class="h2">SUBIR ARCHIVO</h2>
				<div>
					<form action="{{ route('serie.upload',$id) }}" method="post" enctype="multipart/form-data" >
						{{ method_field('PUT') }}
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group">
								<label for="exampleFormControlFile1">Buscar archivo</label>
								<input name="image" id="image" type="file" class="file">
							</div>
							<input type="submit" name="Enviar" class="btn btn-danger" id="Boton1" value="Subir">
						</div>

					</form>
					<div>
						<a href="{{ route('serie.index') }}" class="btn btn-primary" id="Boton2">Volver</a>
					</div>
				</div>
			</div>
	</section>
@endsection











