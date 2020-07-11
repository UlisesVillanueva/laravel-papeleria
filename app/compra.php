<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;

class compra extends Model
{
	use TraitPapeleria;
    protected $fillable = [
        'fecha', 'total_compra',
    ];

                

}
