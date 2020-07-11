<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

use App\Producto;
use App\Proveedor;
use App\Unidad;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {  
  
            return Producto::listar('producto.VistaProductos');
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
            $proveedores=Proveedor::all();
            $unidades=Unidad::all();
            return view('producto.RegistrarProducto',compact('unidades','proveedores'));
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


        request()->validate([ 
            'nombre'=>'required',
            'marca'=>'required',
            'descripcion'=>'required',
            'cantidad'=>'required',
            'unidad_id'=>'required',
            'proveedor_id'=>'required',
            'imagen'=>'required'
        ],[
            'nombre.required'=>'Debes ingresar un nombre',
            'marca.required'=>'Debes ingresar la marca del producto',
            'descripcion.required'=>'Debes ingresar una descripción',
            'unidad_id.required'=>'Debes seleccionar una unidad',
            'proveedor_id.required'=>'Debes seleccionar unproveedor',
            'imagen.required'=>'Debes ingresar una imagen',
        ]);



        $imagenn;
        if($request->hasFile('imagen')){
        $file =$request->file('imagen');
        $imagenn=time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenes/',$imagenn);
        } 
     
        $produ = new Producto();
        $produ->nombre=$request->input('nombre');
        $produ->marca=$request->input('marca');
        $produ->descripcion=$request->input('descripcion');
        $produ->precio=$request->input('precio');
        $produ->cantidad=$request->input('cantidad');
        $produ->unidad_id=$request->input('unidad_id');
        $produ->proveedor_id=$request->input('proveedor_id');
        $produ->imagen=$imagenn;

        $produ->save();

        
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $unidades = Unidad::all();


         return redirect()->route('productos',compact('proveedores','unidades','productos'))
        ->with('status', 'Producto registrado correctamente');  
           
        }else{
            return view('error')->with('status', 'PLOX INICIA SESION'); 
        }   

    }

    /**
    
    */
    public function show($id)
    {
        if (Auth::check()) {    
            $producto=Producto::find($id);
            $idp=$producto->proveedor_id;
            $idu=$producto->unidad_id;
            $proveedor=Proveedor::find($idp);
            $unidad=Unidad::find($idu);
           
            return view('producto.MostrarProducto',compact('producto','proveedor','unidad'));
        }else{
             return view('error')->with('status', 'PLOX INICIA SESION'); 
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $proveedores=Proveedor::all();
        $unidades=Unidad::all();


        return view('producto.EditarProducto',compact('producto','unidades','proveedores'));

      
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

        request()->validate([ 
            'nombre'=>'required',
            'marca'=>'required',
            'descripcion'=>'required',
            'cantidad'=>'required',
            'unidad_id'=>'required',
            'proveedor_id'=>'required',
            'imagen'=>'required'
        ],[
            'nombre.required'=>'Debes ingresar un nombre',
            'marca.required'=>'Debes ingresar la marca del producto',
            'descripcion.required'=>'Debes ingresar una descripción',
            'unidad_id.required'=>'Debes seleccionar una unidad',
            'proveedor_id.required'=>'Debes seleccionar unproveedor',
            'imagen.required'=>'Debes ingresar una imagen',
        ]);
        $imagenn;
        $produ = producto::find($id);
        $produ->fill($request->all()); 



        if($request->hasFile('imagen')){
        $file =$request->file('imagen');
        $imagenn=time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenes/',$imagenn);
        } 
     

        $produ->nombre=$request->input('nombre');
        $produ->marca=$request->input('marca');
        $produ->descripcion=$request->input('descripcion');
        $produ->precio=$request->input('precio');
        $produ->cantidad=$request->input('cantidad');
        $produ->unidad_id=$request->input('unidad_id');
        $produ->proveedor_id=$request->input('proveedor_id');
        $produ->imagen=$imagenn;

        $produ->Actualizar($id,$produ);

        $produ->save();

        
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $unidades = Unidad::all();


         return redirect()->route('productos',compact('proveedores','unidades','productos'))
        ->with('status', 'Producto actualizado correctamente');  
           
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
        if (Auth::check()) {  
        $produ = producto::find($id);        
        $produ->delete();
        
        $productos = producto::all();
        return redirect()->route('productos',compact('productos'))
        ->with('status', 'producto eliminado correctamente');       
           
        }else{return view('error')->with('status', 'PLOX INICIA SESION');}  
    }
    
}
