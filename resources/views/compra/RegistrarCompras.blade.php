@extends('layouts.app')

@section('title','Registro Compra')

@section('contenido')





  <img style="position:absolute; top:300px; left:600px;"  src="/img/agregarfunci.png" >
	<div class="container">    
    <h3>Carrito de compras</h3>
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

 
                    <form class="form-horizontal" method="POST" action="/Compra" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label class="col-md-4 control-label">Producto</label>
                            <div class="col-md-4">
                             <select class="form-control" name="producto_id" id="producto_id">
                                <option value="" disabled selected>Seleccione Producto</option>
                                    @foreach ($productos as $producto)
                                    <option value="{{ $producto['id']}}">{{ $producto['nombre']}}</option>
                                     @endforeach
                            </select>
                         </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Cantidad</label>
                            <div class="col-md-4">
                                <input id="canti" type="number" class="form-control" name="canti">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Compra
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