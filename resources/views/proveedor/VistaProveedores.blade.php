@extends('layouts.app')
@section('title','Listado de proveedores')
@section('contenido')


	@if(session('status')) 
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif 


<div class="container">

	            <a  style="position:center;" href="{{route('Proveedor.create')}}">
                <img width="216" src="/img/nuevoprove.png" ></a>
	<div class="row">
    	@if(isset($list))
			@foreach($list as $proveedor)
				<div class="col-sm">
					<div  style="width: 10rem;">
					  	<img class="card-img-top" src="/img/provee.png"  alt="">
					  		<div class="card-body">
					  			<center>
					  			<h3 class="card-title">{{ $proveedor->nombre}}</h3>
					  			<h5 class="card-title">{{ $proveedor->telefono}}</h5>
						    	<a href="/Proveedor/{{$proveedor->id}}"  class="btn btn-outline-dark">Ver más</a>
					  			</center>
					  		</div>
					</div>
				</div>
    		@endforeach
		@endif
  	</div>
</div>
@endsection