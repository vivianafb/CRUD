<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('usuario.index')
        ->with('users',$users);
    }

    public function show(){

    }

    public function perfil($id)
    {
        $users = User::find($id);
        return view('usuario.perfil')
        ->with('users',$users);
    }

    public function edit($id){
        $users=User::find($id);
        return view('usuario.edit')->with('users',$users);
    }

    public function update(Request $request, $id)
    {
        
        $users=User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->update();
        
        //return redirect('usuario.perfil')
        return redirect()->route('usuario.perfil', $users->id)
        ->with('mensaje','Los datos han sido modificados');

    }

    
}
