@extends('layouts.app')


@section('title','Listado de ventas')
@section('contenido')


    @if(session('status')) 
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif 

<h3 align="center" ><br>Inventario de ventas</h3>

<div style="" class="container">
    <div class="row">
                
                <a  style="position:center;" href="{{route('Venta.create')}}">
                <img width="216" src="/img/nuevaventa.png" ></a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Folio de Venta</th>
      <th scope="col">Precio</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha de venta</th>
      <th scope="col">Usuario</th>
      <th scope="col">Total Venta</th>
    </tr>
  </thead>
  <tbody>
    <tr>        
                        @if(isset($list))
                        @foreach($list as $d_venta)
                        <td>{{$d_venta->id}}</td>
                            @if(isset($productos))
                            @foreach($productos as $producto)
                                @if (($d_venta->producto_id)==($producto->id))
                                    <td>${{$producto->precio}}</td>
                                    <td>{{$producto->nombre}}</td>
                                @endif
                            @endforeach
                            @endif
                        <td>{{$d_venta->cantidad}}</td>
                            @if(isset($ventas))
                            @foreach($ventas as $venta)
                                @if (($d_venta->venta_id)==($venta->id))
                                    <td>{{$venta->fecha}}</td>
                                @endif
                            @endforeach
                                    @if(isset($usuarios))
                                    @foreach($usuarios as $user)
                                        @if (($venta->user_id)==($user->id))
                                            <td>{{$user->name}}</td>
                                        @endif
                                    @endforeach
                                    @endif
                            @endif

                            <td>${{$d_venta->precio_total}}</td>
                        </form>
                        </td>
    </tr>
  </tbody>
        @endforeach 
    @endif
</table>
@endsection