<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;
class producto extends Model
{
	use TraitPapeleria;
    protected $fillable = [
        'nombre', 'marca', 'descripcion','precio','cantidad','unidad_id','imagen','proveedor_id'
    ];

}

