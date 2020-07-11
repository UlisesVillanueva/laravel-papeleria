@extends('layouts.app')
@section('title','Proveedor')
@section('contenido')


  @if(session('status')) 
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif 


<div class="container">
  <div class="row">

        <div class="col-sm">
          <div  style="width: 10rem;">
              <img class="card-img-top" src="/img/provee.png"  alt="">
                <div class="card-body">
                  <center>
                  <h3 class="card-title">{{ $proveedor->nombre}}</h3>
                  <h5 class="card-title">{{ $proveedor->telefono}}</h5>
                  


                  <a href="/Proveedor/{{$proveedor->id}}/edit" title="Editar" data-toggle="tooltip">
                <img src="/img/editar.png"></a>  

                <form onclick="return confirm ('¿Esta seguro de eliminar el proveedor?')"  method="POST" action="/Producto/{{$proveedor->id}}">
                @csrf {{ method_field('DELETE') }}
                <input   title="Eliminar" type="image" src="/img/eliminar.png" value="Eliminar">    
                </form>


                  </center>
                </div>
          </div>
        </div>

    </div>
</div>
@endsection