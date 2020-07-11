<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;
class unidad extends Model
{
	use TraitPapeleria;
    protected $fillable = [
        'unidad', 
    ];

}
