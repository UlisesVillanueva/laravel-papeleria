<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;


class direccion extends Model
{
	use TraitPapeleria;
    protected $fillable = [
        'calle', 'ciudad', 'estado','codigo_postal'
    ];




}
