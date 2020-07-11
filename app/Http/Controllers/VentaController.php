<?php

namespace App\Http\Controllers;
use App\Traits\TraitPapeleria;

use Illuminate\Http\Request;
use App\Producto;
use App\venta;
use App\Unidad;
use App\detalle_venta;
use App\proveedor;
use App\user;
use Auth;
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {    
        // $d_ventas = detalle_venta::all();
        // $ventas = venta::all();
        // $productos = producto::all();
        // $usuarios=user::all();

         return detalle_venta::listar('venta.VistaVentas');

        // return view('venta.VistaVentas',compact('productos','ventas','d_ventas','usuarios'));
        
        }else{
             return view('error')->with('status', 'PLOX INICIA SESION'); 
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {    
            $productos=Producto::all();
            $ventas=venta::all();
            //return 'hola';
            return view('venta.RegistrarVenta',compact('productos','ventas'));
        }else{
             return view('error')->with('status', 'PLOX INICIA SESION'); 
        }    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

        $producto = producto::find($request->input('producto_id'));
        $cosT= $producto->precio*$request->input('canti');

        $cantAct =$producto->cantidad;
        $canT = $cantAct-$request->input('canti');

        $producto = producto::find($request->input('producto_id'))->update(['cantidad' => $canT]);

        $venta = new venta();
        $venta->fecha= date("Y-m-d H-i-s");
        $venta->total_venta=$cosT;
        $venta->user_id=Auth::id();
        $venta->save();
        

        $d_venta = new detalle_venta();
        $d_venta->venta_id=$venta->id;
        $d_venta->precio_total=$cosT;
        $d_venta->producto_id=$request->input('producto_id');
        $d_venta->cantidad=$request->input('canti');

        $d_venta->save();

        $d_ventas = detalle_venta::all();
        $ventas = venta::all();
        $productos = producto::all();
        $usuarios=user::all();
        return redirect()->route('ventas',compact('ventas','d_ventas','productos','usuarios'))
        ->with('status', 'Proveedor registrado correctamente');       
           
        }else{
            return view('error')->with('status', 'PLOX INICIA SESION');   
        }  


         
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
        $id2=$request->input('venta_id');
        $venta = venta::find($id2);
        $venta->fill($request->all());


        $d_venta = detalle_venta::find($id);
        $d_venta>fill($request->all());


        $producto = producto::find($request->input('producto_id'));
        $cosT= $producto->precio*$request->input('canti');

        $cantAct =$producto->cantidad;
        $canT = $cantAct-$request->input('canti');

        $producto = producto::find($request->input('producto_id'))->update(['cantidad' => $canT]);

       
        $venta->fecha= date("Y-m-d H-i-s");
        $venta->total_venta=$cosT;
        $venta->user_id=Auth::id();
       $venta->Actualizar($id,$venta);
        

        $d_venta->venta_id=$venta->id;
        $d_venta->precio_total=$cosT;
        $d_venta->producto_id=$request->input('producto_id');
        $d_venta->cantidad=$request->input('canti');

        $d_venta->Actualizar($id,$d_venta);

        $d_ventas = detalle_venta::all();
        $ventas = venta::all();
        $productos = producto::all();
        $usuarios=user::all();
        return redirect()->route('ventas',compact('ventas','d_ventas','productos','usuarios'))
        ->with('status', 'Venta modificada correctamente');       
           
        }else{
            return view('error')->with('status', 'PLOX INICIA SESION');   
        }  

        
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
