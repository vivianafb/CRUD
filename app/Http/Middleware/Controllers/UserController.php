<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function inicio()
    {
        $users = User::all();
        return view('usuario.inicio')
        ->with('users',$users);
    }

    public function show(){

    }

    public function edit($id){
        $usuario=User::find($id);
        return view('usuario.edit')->with('usuario',$usuario);
    }

    
}
