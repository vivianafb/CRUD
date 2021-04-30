<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Models\Detalle_Carrito;
use App\Models\Carrito;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    //

    public function getMail(){
        
        $carrito=DB::select('select id from carritos where users_id = ?', [auth()->user()->id]);        
        $id_carrito =json_encode($carrito[0]->id);
        $detalle = Detalle_Carrito::all()->where('carritos_id',$id_carrito);
        $cantidad = 0;
        
        $id_usuario =auth()->user()->id;
        $carrito = Carrito::where('users_id', $id_usuario)
        ->first()
        ->estado;
        
        $nuevo_estado = 2;
        $arregloUpdate = [
        'estado' => $nuevo_estado
        ];
        
        DB::table('carritos')
        ->where('users_id', $id_usuario)
        ->update($arregloUpdate);

        $data = 
        ['name' => auth()->user()->name,
        'detalle_carrito' => $detalle
        ];

        $email = auth()->user()->email;
        Mail::to($email)->send(new TestMail($data));
        Detalle_Carrito::where('carritos_id', $id_carrito)->delete();        
        return redirect('carrito')->with('mensaje','Tu compra ha sido exitosa! Te hemos enviado un correo con el detalle de tu compra')
        ->with('cantidad',$cantidad);

        
    }

   
}
