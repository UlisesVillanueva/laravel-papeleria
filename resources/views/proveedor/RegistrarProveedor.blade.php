@extends('layouts.app')

@section('title','Registro Proveedor')

@section('contenido')





  <img style="position:absolute; top:300px; left:600px;"  src="/img/agregarfunci.png" >
	<div class="container">    
    <h3>Registro de Proveedor</h3>
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

 
                    <form class="form-horizontal" method="POST" action="/Proveedor" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label  class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-4">
                                <input id="nombre" type="text" class="form-control" name="nombre">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-4">
                                <input id="telefono"  type="text" class="form-control" name="telefono">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Calle</label>
                            <div class="col-md-4">
                                <input id="calle"  type="text" class="form-control" name="calle">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ciudad</label>
                            <div class="col-md-4">
                                <input id="ciudad"  type="text" class="form-control" name="ciudad">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Estado</label>
                            <div class="col-md-4">
                                <input id="estado"  type="text" class="form-control" name="estado">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Código Postal</label>
                            <div class="col-md-4">
                                <input id="codigo_postal"  type="text" class="form-control" name="codigo_postal">
                            </div>
                        </div>

                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Proveedor
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