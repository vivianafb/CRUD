<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Serie;
use App\Models\Categoria;
use App\Models\Detalle_Carrito;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio(Request $request){
        $categorias = Categoria::all();
        
        if(auth()->check()){
            $usuario = auth()->user()->id;
            $usuarioExiste = Carrito::where('users_id',$usuario)->exists();

            if(auth()->user()->perfil == "Usuario" && $usuarioExiste){
                $usuario = auth()->user()->id;
                $id_carrito = Carrito::where('users_id', $usuario)->first()->id;
                $cantidad=Detalle_Carrito::where('carritos_id',$id_carrito)->get()->count();

                $buscarpor=$request->get('Categoria');
                if($buscarpor != null ){
                    $id_categoria = Categoria::where('id', $buscarpor)->first()->id;
                    $series=Serie::where('categorias_id',$id_categoria)->paginate(15);
                    return view('serie.inicio')
                    ->with('series',$series)
                    ->with('categorias',$categorias)
                    ->with('buscarpor',$buscarpor)
                    ->with('cantidad',$cantidad);
                }else{
                    $series=Serie::paginate(15);
                    return view('serie.inicio')
                    ->with('series',$series)
                    ->with('categorias',$categorias)
                    ->with('buscarpor',$buscarpor)
                    ->with('cantidad',$cantidad);
                }
            
            }else{
                $buscarpor=$request->get('buscarpor');
                if($buscarpor != null){
                    
                    $id_categoria = Categoria::where('id', $buscarpor)->first()->id;
                    $cantidad = 0;
                    $series=Serie::where('categorias_id',$id_categoria)->paginate(15);
                    return view('serie.inicio')
                    ->with('series',$series)
                    ->with('categorias',$categorias)
                    ->with('buscarpor',$buscarpor)
                    ->with('cantidad',$cantidad);
                }else{
                    $cantidad = 0;
                    $series=Serie::paginate(15);
                    return view('serie.inicio')
                    ->with('series',$series)
                    ->with('categorias',$categorias)
                    ->with('buscarpor',$buscarpor)
                    ->with('cantidad',$cantidad);
                }
            }
                
        }else{
            $buscarpor=$request->get('Categoria');
            if($buscarpor != null){
                $id_categoria = Categoria::where('id', $buscarpor)->first()->id;
                $cantidad = 0;
                $series=Serie::where('categorias_id',$id_categoria)->paginate(15);
                return view('serie.inicio')
                ->with('series',$series)
                ->with('categorias',$categorias)
                ->with('buscarpor',$buscarpor)
                ->with('cantidad',$cantidad);
            }else{
                $cantidad = 0;
                $series=Serie::paginate(15);
                return view('serie.inicio')
                ->with('series',$series)
                ->with('categorias',$categorias)
                ->with('buscarpor',$buscarpor)
                ->with('cantidad',$cantidad);
            }
        }
            
    }
    
    public function index()
    {
       
        //
        $categorias['categorias']=Categoria::paginate(15);
        $series['series']=Serie::paginate(15);
        
        return view('serie.index',$series,$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias['categorias']=Categoria::paginate(15);
        
        return view('serie.create',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $validacion=[
        //     'Nombre'=>'required|string|max:100',
        //     'Categoria'=>'required|string|max: 100',
        // ];
        // $mensaje=[
        //     'required'=>'El :attribute es requerido',
            
        // ];

        $series = new Serie();
        $series->id = $request->id;
        $series->nombre = $request->nombre;
        $series->precio = $request->precio;
        $series->categorias_id = $request->Categoria;
        $series->save();
        //return response()->json($datosSerie);
        return redirect('serie')->with('mensaje','La serie ha sido agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categorias=Categoria::all();
        $serie=Serie::find($id);
        return view('serie.edit')
        ->with('serie',$serie)
        ->with('categorias',$categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // //
        // $validacion=[
        //     'Nombre'=>'required|string|max:100',
        //     'Categoria'=>'required|string|max: 100',
            
        // ];

        // $mensaje=[
        //     'required'=>'El :attribute es requerido',
            
        // ];
        // if($request->hasFile('Imagen')){
        //     $validacion=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
        //     $mensaje=['Imagen.required' =>'Falta la imagen'];
        // }
        
        

        $serie=Serie::find($id);
        $serie->nombre = $request->nombre;
        $serie->precio = $request->precio;
        $serie->categorias_id = $request->Categoria;
        $serie->update();

        return redirect('serie')->with('mensaje','Los datos han sido modificados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        //
        $nombre_fichero = 'img/series/'.$serie->id.'.jpg';
        unlink($nombre_fichero);
        $serie->delete();
        return redirect('serie'); 
    }



    public function imagen($id){
        return view('serie.upload')
        ->with('id',$id);
    }

    public function upload(Request $request, $id){
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'image.required' => 'Seleccione un archivo.',
            'image.image' => 'Formato no valido.',
            'image.mimes' => 'Formato no valido.',
            'image.max' => 'Peso excede el maximo permitido (Max: 2Mb).'
        ]);

        $imageName = $id.'.jpg';
        $request->image->move(('public_html/img/series'), $imageName);
        return redirect('serie')->with('Imagen cargada');
    }
}
