@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="content" style="position:center;">
                <div class="title m-b-md">

                <a  style="position:center;" href="{{route('productos')}}">
                <img width="216" src="/img/produ.png" ></a>


                @if (auth()->user()->perfil_id==1)
                    <a  style="position:center;" href="{{route('proveedores')}}">
                    <img width="216" src="/img/proveed.png" ></a>

                    <a  style="position:center;" href="{{route('compras')}}">
                    <img width="216" src="/img/compras.png" ></a>
                @endif

                <a  style="position:center;" href="{{route('ventas')}}">
                <img width="216" src="/img/ventas.png" ></a>


       
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
