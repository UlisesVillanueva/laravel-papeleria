<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TraitPapeleria;

class proveedor extends Model
{
	use TraitPapeleria;
    protected $fillable = [
        'nombre', 'direcion_id', 'telefono',
    ];

}
