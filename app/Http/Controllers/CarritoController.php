<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Serie;
use App\Models\Detalle_Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('carrito.index');
    }

    public function agregar(Request $request,$id,$user,$precio){
        
    //    $carrito = new Carrito();
    //    $carrito->carrito_id= $request->id;
    //    $carrito->users_id = $user;
    //    $carrito->total = $precio;
    //    $carrito->estado= $request->estado;

    //    $detalle_carrito = new Detalle_Carrito();
       
    //    $detalle_carrito->series_id = $id;
    //    $detalle_carrito->precio = $precio;
    //    $detalle_carrito->cantidad=$request->cantidad;
        return redirect('/')->with('mensaje','Se agrego al carrito correctamente');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }
}
