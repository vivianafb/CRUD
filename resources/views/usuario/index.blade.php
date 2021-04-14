@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Perfil</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->perfil}}</td>
            <td>{{$user->email}}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection