@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/serie/'.$serie->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('serie.form',['modo'=>'Editar'])
    </form>

</div>
@endsection