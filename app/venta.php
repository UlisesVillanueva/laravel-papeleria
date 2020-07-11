<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;
class venta extends Model
{
    use TraitPapeleria;
        protected $fillable = [
        'fecha', 'total_venta','user_id'
    ];
}

