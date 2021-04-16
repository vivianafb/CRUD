<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Carrito extends Model
{
    use HasFactory;

    protected $table = "detalle_carritos";
    
    public function series()
	{
		return $this->belongsTo('App\Models\Serie');
	}
}
