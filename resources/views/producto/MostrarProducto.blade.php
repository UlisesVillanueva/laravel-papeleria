@extends('layouts.app')
@section('title','Productor')
@section('contenido')


  @if(session('status')) 
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif 

<center>
  <div class="container">
  <div class="row">

        <div class="col-md ">
          <div  style="width: 10rem;">
              <img class="card-img-top" src="/imagenes/{{ $producto->imagen}}"  alt="">
                <div class="card-body">
                  <center>
                  <h3 class="card-title">Nombre: {{ $producto->nombre}}</h3>
                  <h5 class="card-title">Marca: {{ $producto->marca}}</h5>
                  <h5 class="card-title">Descripción:{{ $producto->descripcion}}</h5>
                  <h5 class="card-title">Precio: ${{ $producto->precio}}</h5>
                  <h5 class="card-title">Cantidad:{{ $producto->cantidad}}</h5>
                  <h5 class="card-title">Unidad:{{ $unidad->unidad}}</h5>
                  <h5 class="card-title">Proveedor:{{ $proveedor->nombre}}</h5>


                  @if (auth()->user()->perfil_id==1)

                <a href="/Producto/{{$producto->id}}/edit" title="Editar" data-toggle="tooltip">
                <img src="/img/editar.png"></a>  

                <form onclick="return confirm ('¿Esta seguro de eliminar el producto?')"  method="POST" action="/Producto/{{$producto->id}}">
                @csrf {{ method_field('DELETE') }}
                <input   title="Eliminar" type="image" src="/img/eliminar.png" value="Eliminar">    
                </form>

                @endif
                  </center>
                </div>
          </div>
        </div>

    </div>
</div>
</center>

@endsection