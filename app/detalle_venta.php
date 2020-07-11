<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;

class detalle_venta extends Model
{
	use TraitPapeleria;
	protected $fillable = [
        'precio_total', 'producto_id', 'venta_id','cantidad'
    ];
    //
}

