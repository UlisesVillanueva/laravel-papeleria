<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;
class detalle_compra extends Model
{

	use TraitPapeleria;
    protected $fillable = [
        'compra_id','precio_total', 'producto_id', 'cantidad',
    ];

}
