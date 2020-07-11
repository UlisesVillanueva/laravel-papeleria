@extends('layouts.app')

@section('title','Registro Producto')

@section('contenido')

  <img style="position:absolute; top:300px; left:600px;"  src="/img/agregarfunci.png" >
	<div class="container">    
    <h3>Registro de producto</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">

 

                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

 
                    <form class="form-horizontal" method="POST" action="/Producto" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label  class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-4">
                                <input id="nombre" type="text" class="form-control" name="nombre">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">marca</label>
                            <div class="col-md-4">
                                <input id="marca"  type="text" class="form-control" name="marca">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-4">
                                <input id="descripcion"  type="text" class="form-control" name="descripcion">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Precio</label>
                            <div class="col-md-4">
                                <input id="precio"  type="text" class="form-control" name="precio">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cantidad</label>
                            <div class="col-md-4">
                                <input id="cantidad"  type="integer" class="form-control" name="cantidad">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-4">
                                <input id="imagen"  type="file" class="form-control" name="imagen">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Unidad</label>
                            <div class="col-md-4">
                             <select class="form-control" name="unidad_id" id="unidad_id">
                                <option value="" disabled selected>Seleccione Unidad</option>
                                    @foreach ($unidades as $unidad)
                                    <option value="{{ $unidad['id']}}">{{ $unidad['unidad']}}</option>
                                     @endforeach
                            </select>
                         </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Proveedor</label>
                            <div class="col-md-4">
                             <select class="form-control" name="proveedor_id" id="proveedor_id">
                                <option value="" disabled selected>Seleccione Proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor['id']}}">{{ $proveedor['nombre']}}</option>
                                     @endforeach
                            </select>
                         </div>
                        </div>




                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Producto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





     <center>  <img src=""> </center>
</div>
@endsection