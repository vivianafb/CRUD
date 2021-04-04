@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/serie') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('serie.form',['modo'=>'Registrar'])

    </form>
</div>
@endsection