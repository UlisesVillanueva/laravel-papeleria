@extends('layouts.app')


@section('title','Listado de compras')
@section('contenido')


    @if(session('status')) 
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif 

<h3 align="center" ><br>Inventario de compras</h3>

<div style="" class="container">
    <div class="row">

      <a  style="position:center;" href="{{route('Compra.create')}}">
                <img width="216" src="/img/nuevacompra.png" ></a>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Folio de Compra</th>
      <th scope="col">Precio</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha de compra</th>
      <th scope="col">Total Compra</th>
    </tr>
  </thead>
  <tbody>
    <tr>        
                        @if(isset($list))
                        @foreach($list as $d_compra)
                        <td>{{$d_compra->id}}</td>
                            @if(isset($productos))
                            @foreach($productos as $producto)
                                @if (($d_compra->producto_id)==($producto->id))
                                    <td>${{$producto->precio}}</td>
                                    <td>{{$producto->nombre}}</td>
                                @endif
                            @endforeach
                            @endif
                        <td>{{$d_compra->cantidad}}</td>
                            @if(isset($compras))
                            @foreach($compras as $compra)
                                @if (($d_compra->compra_id)==($compra->id))
                                    <td>{{$compra->fecha}}</td>
                                @endif
                            @endforeach
                            @endif

                            <td>${{$d_compra->precio_total}}</td>
                        </form>
                        </td>
    </tr>
  </tbody>
        @endforeach 
    @endif
</table>
@endsection