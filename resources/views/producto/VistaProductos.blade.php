@extends('layouts.app')
@section('title','Listado de productos')
@section('contenido')


	@if(session('status')) 
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif 
 

<div class="container">
	<a  style="position:center;" href="{{route('Producto.create')}}">
                <img width="216" src="/img/nuevoprodu.png" ></a>
	<div class="row">
    	@if(isset($list))
			@foreach($list as $producto)
				<div class="col-sm">
					<div  style="width: 15rem;">
					  	<img class="card-img-top" src="/imagenes/{{$producto->imagen}}" alt="">
					  		<div class="card-body">
					  			<center>
					  			<h5 class="card-title">Nombre:{{ $producto->nombre }}</h5>
					  			<h5 class="card-title">Marca:{{ $producto->marca }}</h5>
					  			<h5 class="card-title">Descripción:{{ $producto->descripcion}}</h5>
					  			<h5 class="card-title">Precio: ${{ $producto->precio }}</h5>
					  			<h5 class="card-title">Cantidad:{{ $producto->cantidad }}</h5>
						    	<a href="/Producto/{{$producto->id}}" class="btn btn-outline-info">Ver más</a>
					  			</center>
					  		</div>
					</div>
				</div>
    		@endforeach
		@endif
  	</div>
</div>




@endsection