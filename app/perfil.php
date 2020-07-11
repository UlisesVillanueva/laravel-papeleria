<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\TraitPapeleria;
class perfil extends Model
{
	use TraitPapeleria;
    protected $fillable = [
        'perfil'
    ];
}
