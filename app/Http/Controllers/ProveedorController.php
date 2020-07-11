<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Direccion;
use App\Proveedor;
use App\Unidad;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {    

            return Proveedor::listar('proveedor.VistaProveedores');
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
           
            return view('proveedor.RegistrarProveedor');
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
            'calle'=>'required',
            'cuidad'=>'required',
            'estado'=>'required',
            'codigo_postal'=>'required|max:5|numeric',
            'nombre'=>'required',
            'telefono'=>'required',
        
        ],[
            'calle.required'=>'Debes ingresar una calle',
            'cuidad.required'=>'Debes ingresar una cuidad',
            'estado.required'=>'Debes ingresar un estado',
            'codigo_postal.required'=>'Debes ingresar un codigo postal',
            'codigo_postal.numeric'=>'No puedes ingresar letras en el codigo postal',
            'codigo_postal.max'=>'El codigo postal debe ser de 5 digitos',
            'nombre.required'=>'Debes ingresar el nombre del proveedor',
            'telefono.required'=>'Debes ingresar el numero de telefono',
        ]);

     
        $direcc = new Direccion();
        $direcc->calle=$request->input('calle');
        $direcc->ciudad=$request->input('ciudad');
        $direcc->estado=$request->input('estado');
        $direcc->codigo_postal=$request->input('codigo_postal');
        $direcc->save();

        $id_dir=$direcc->id;

        $provee = new Proveedor();
        $provee->nombre=$request->input('nombre');
        $provee->telefono=$request->input('telefono');
        $provee->direccion_id=$id_dir;

        $provee->save();

        $proveedores = Proveedor::all();
        return redirect()->route('proveedores',compact('proveedores'))
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
         if (Auth::check()) {    
            $proveedor=Proveedor::find($id);
            $idd=$proveedor->direccion_id;

            $direccion=direccion::find($idd);
  
        
            return view('proveedor.MostrarProveedor',compact('proveedor','direccion'));
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
        $proveedor = proveedor::find($id);
        $dirpro = $proveedor->direccion_id; 
        $direccion = Direccion::find($dirpro);
        return view('proveedor.EditarProveedor',compact('proveedor','direccion'));
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

        $id2=$request->input('direccion_id');
        $direcc= direccion::find($id2);
        $direcc->fill($request->all());

        $provee = proveedor::find($id);
        $provee->fill($request->all());
     
 
        $direcc->calle=$request->input('calle');
        $direcc->ciudad=$request->input('ciudad');
        $direcc->estado=$request->input('estado');
        $direcc->codigo_postal=$request->input('codigo_postal');
        $direcc->Actualizar($id2,$direcc);


        $id_dir=$direcc->id;

        $provee->nombre=$request->input('nombre');
        $provee->telefono=$request->input('telefono');
        $provee->direccion_id=$id_dir;

        $provee->Actualizar($id,$provee);

        $proveedores = Proveedor::all();
        return redirect()->route('proveedores',compact('proveedores'))
        ->with('status', 'Proveedor actualizado correctamente');       
           
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
        $prove = proveedor::find($id);
        $prove->delete();

        $proveedores = Proveedor::all();
        return redirect()->route('proveedores',compact('proveedores'))
        ->with('status', 'Proveedor eliminado correctamente');       
           
        }else{return view('error')->with('status', 'PLOX INICIA SESION');}  
    }
    
}
