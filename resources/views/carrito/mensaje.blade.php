@extends('layouts.app')

@section('content')
<section class="carrito">
    <div class="carrito_content container">
    @if (Session::has('mensaje'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
</div>
@endsection