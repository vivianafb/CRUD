<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use Illuminate\Http\Response;


class CsvController extends Controller
{
    //

    public function index(){

    }

    public function descargarCsv(){

        $datos = Serie::all();

        $nombre = 'series.csv';
        $archivo = fopen("series.csv", "w");
        fputcsv($archivo,[
            "Id",
            "Nombre",
            "Precio",
            "Categoria"
        ], ',');

        foreach($datos as $value){
            fputcsv($archivo,[
                $value->id,
                $value->nombre,
                $value->precio,
                $value->categoria,
            ], ',');
        }
        $headers = [
			"Content-type" => "text/csv",
			"Content-Disposition" => "attachment; filename=ventas_masivas.csv",
			"Pragma" => "no-cache",
			"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
			"Expires" => "0"
		];
        fclose($archivo);
        return response()->download('series.csv', $nombre, $headers)->deleteFileAfterSend(true);;
    }
}
