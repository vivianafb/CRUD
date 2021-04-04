<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $validacion=[
            'Nombre'=>'required|string|max:100',
            'Categoria'=>'required|string|max: 100',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required' =>'Falta la imagen'
        ];

        $this->validate($request, $validacion,$mensaje);



        $datosSerie = request()->except('_token');
        
        if($request->hasFile('Imagen')){
            $datosSerie['Imagen'] = $request->file('Imagen')->store('uploads','public');
        };

        Serie::insert($datosSerie);
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
        
        //
        $categorias=Categoria::findOrFail($id);
        $serie=Serie::find($id);
        return view('serie.edit', $serie);
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
        //
        $validacion=[
            'Nombre'=>'required|string|max:100',
            'Categoria'=>'required|string|max: 100',
            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            
        ];
        if($request->hasFile('Imagen')){
            $validacion=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required' =>'Falta la imagen'];
        }

        $this->validate($request, $validacion,$mensaje);
        
        $datosSerie = request()->except(['_token','_method']);

        if($request->hasFile('Imagen')){
            $serie=Serie::findOrFail($id);
            Storage::delete('public/'.$serie->Imagen);
            $datosSerie['Imagen'] = $request->file('Imagen')->store('uploads','public');
        };


        Serie::where('id','=',$id)->update($datosSerie);
        $serie=Serie::findOrFail($id);
        //return view('serie.edit',compact('serie'));
        return redirect('serie')->with('mensaje','Los datos han sido modificados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $serie=Serie::findOrFail($id);
        if(Storage::delete('public/'.$serie->imagen)){
            Serie::destroy($id);
        };

    
        return redirect('serie')->with('mensaje','La serie ha sido eliminada');
    }
}
