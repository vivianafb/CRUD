<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Serie;
use App\Models\Detalle_Carrito;
use CreateSeriesTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user()->id;

        $carritoExiste = Carrito::where('users_id',$usuario)->exists();

        if($carritoExiste){
            $usuario = auth()->user()->id;
            $totalCarrito = DB::select('select total from carritos where users_id = ?', [$usuario]);
            $total = json_encode($totalCarrito[0]->total);
    
    
            $carrito=DB::select('select id from carritos where users_id = ?', [$usuario]);
            $id_carrito =json_encode($carrito[0]->id);
            
            $cantidad=Detalle_Carrito::where('carritos_id',$id_carrito)->get()->count();
    
            $detalle_carrito = Detalle_Carrito::where('carritos_id',$id_carrito)->get();
            
            $cantidad = Detalle_Carrito::where('carritos_id',$id_carrito)->count();
            if($cantidad != 0){
                $detallecar=DB::select('select * from detalle_carritos where carritos_id  = ?', [$id_carrito]);
                $detalle = json_encode($detallecar[0]);
            }else{
                $detalle = 0;
                $total = 0;
            }
        
            return view('carrito.index')
            ->with('detalle_carrito',$detalle_carrito)
            ->with('detalle',$detalle)
            ->with('cantidad',$cantidad)
            ->with('total',$total);
        }else{
            return redirect('/')->with('mensaje', 'El carrito está vacio');
        }
        
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
    public function store(request $request,$idUsuario,$idSerie )
    {
        $usuarioExiste = Carrito::where('users_id',$idUsuario)->exists();
        $serie = Serie::find($idSerie);

        if(!$usuarioExiste){
            //Creacion del carrito
            $carrito = new Carrito();
            $carrito->users_id=$idUsuario;
            $carrito->total=0;
            $carrito->save();
        }
        $total = $serie->precio +  Carrito::where('users_id', $idUsuario)
            ->first()->total;

        $arrayTotal= [
             'total' => $total,
        ];
        
        DB::table('carritos')
        ->where('users_id', $idUsuario)
        ->update($arrayTotal);        


       $carrito = Carrito::where('users_id',$idUsuario)->first();
       $productoExisteEnDetalle = Detalle_Carrito::where('series_id',$idSerie)->where('carritos_id', $carrito->id)->exists();
       $serie = Serie::find($idSerie);
        if(!$productoExisteEnDetalle){
            //Añadir series al carrito si no existe

            $carritoDetalle = new Detalle_Carrito();
            $carritoDetalle->carritos_id = $carrito->id;
            $carritoDetalle->series_id = $idSerie;
            $carritoDetalle->precio = $serie->precio;
            $carritoDetalle->cantidad = 1;
            $carritoDetalle->save();
            return back()->with('mensaje','La serie ha sido agregada al carrito!!');;
        }
        //Añadir series al carrito si existe la serie en el carrito
        $precioSerie = $serie->precio +  Detalle_Carrito::where('carritos_id', $carrito->id)
            ->where('series_id',$idSerie)
                ->first()
                    ->precio;
        $cantidadSerie = Detalle_Carrito::where('carritos_id', $carrito->id)
            ->where('series_id',$idSerie)
                ->first()
                    ->cantidad+1; 

        $arregloUpdate = [
            'precio' => $precioSerie,
            'cantidad' => $cantidadSerie
        ];

        DB::table('detalle_carritos')
            ->where('carritos_id', $carrito->id)
                ->where('series_id',$idSerie)
                    ->update($arregloUpdate);

        return back()->with('mensaje','La serie ha sido agregada al carrito');
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
    public function destroy($idSerie, $idCarrito)
    {
        
        $existe = Detalle_Carrito::where('carritos_id',$idCarrito)->exists();



        if($existe){
            
            $id_serie = Serie::find($idSerie);
            $precio = $id_serie->precio;

            $total = Carrito::where('id', $idCarrito)
            ->first()
            ->total;
            
            $arregloUpdate = [
            'total' => $total - $precio
            ];
            
            DB::table('carritos')
            ->where('id', $idCarrito)
            ->update($arregloUpdate);

            Detalle_Carrito::where('series_id', $idSerie)->delete();        
            return back()->with('mensaje','Se ha eliminado un producto!'); 
        }

        
        
        //
    }
}
