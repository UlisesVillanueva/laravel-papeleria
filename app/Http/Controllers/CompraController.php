<?php

namespace App\Http\Controllers;
use App\Traits\TraitPapeleria;
use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;
use App\compra;
use App\detalle_compra;
use App\user;
use Auth;


class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {    
        // $d_compras = detalle_compra::all();
        // $compras = compra::all();
        // $productos = producto::all();
        // $usuarios=user::all();
        // //return 'hola';
        // return view('compra.VistaCompras',compact('productos','compras','d_compras','usuarios'));

            return detalle_compra::listar('compra.VistaCompras');
     
        }else{
             return view('error')->with('status', 'PLOX INICIA SESION'); 
            }
    }


    public function create() {
         if (Auth::check()) {    
            $productos=Producto::all();
            $compras=compra::all();
            //return 'hola';
            return view('compra.RegistrarCompras',compact('productos','compra'));
        }else{
             return view('error')->with('status', 'PLOX INICIA SESION'); 
        } }   


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
        $canT = $cantAct+$request->input('canti');

        $producto = producto::find($request->input('producto_id'))->update(['cantidad' => $canT]);

        $compra = new compra();
        $compra->fecha= date("Y-m-d H-i-s");
        $compra->total_compra=$cosT;
        $compra->Actualizar($id,$compra);

        $d_compra = new detalle_compra();
        $d_compra->compra_id=$compra->id;
        $d_compra->precio_total=$cosT;
        $d_compra->producto_id=$request->input('producto_id');
        $d_compra->cantidad=$request->input('canti');
        $d_compra->Actualizar($id,$d_compra);
     

        $d_compra= detalle_compra::all();
        $compras = compra::all();
        $productos = producto::all();
        $usuarios=user::all();
        return redirect()->route('compras',compact('compras','d_compras','productos','usuarios'))
        ->with('status', 'Compra registrada correctamente');       
           
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
        //
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
