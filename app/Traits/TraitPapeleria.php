<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Model;
use App\Producto;
use App\venta;
use App\compra;
use App\Unidad;
use App\detalle_venta;
use App\proveedor;
use App\user;
use Auth;

trait TraitPapeleria
{
	//definir mi funcion de update
	public static function Actualizar($id,Model $Model){

		//dd($Model);
		return self::where('id',$id)
		->update($Model->attributes);

	}

	public static function listar($vista){
		
		$list= self::all();
		$ventas = venta::all();
		$compras = compra::all();
        $productos = producto::all();
        $proveedores = proveedor::all();
        $usuarios=user::all();

		return view($vista,compact('list','ventas','compras','productos','usuarios','proveedores'));
	}
	
}