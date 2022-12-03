@extends('layouts.principal')

@section('template_title')
    Sale
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span id="card_title">
                                        {{ __('Detalle de Ventas') }}
                                    </span>
                                     <div class="float-right">
                                            <a href="{{ route('sale.pdf') }}" class="btn btn-primary btn-sm float-right"
                                            data-placement="left">
                                            <i class="far fa-solid fa-file-pdf"></i>
                                        </a>
                                          </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dts">
                                        <thead class="thead">
                                            <tr>
                                                
                                                    <th class="text-center">Id-Venta</th>
                                                    <th class="text-center">Clientes</th>
                                                    <th class="text-center">Productos</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-center">Fecha</th>
                                                    <th class="text-center">Total</th>
                                                    <th class="text-center">Ver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                   
                                                    
                                                        <td class="text-center">{{ /* ++$isa */ $sale->id }}</td>

                                                        <td class="text-center">
                                                            @isset( $sale->customer->nombre )
                                                            {{ $sale->customer->nombre }}
                                                            @else
                                                            <p class="ala">Cliente inactivo</p>
                                                            @endisset
                                                        </td>
                                                        <td class="text-center">
                                                            @isset( $sale->product->nombre )
                                                            {{ $sale->product->nombre }}
                                                            @else
                                                            <p class="ala">Producto inactivo</p>
                                                                
                                                            @endisset</td>
                                                        
                                                            <td class="text-center">   {{ $sale->cantidad }}</td>
                                                        <td class="text-center">{{ $sale->created_at }}</td>
<?php 
//$total  = $sale->product->precio * $sale->cantidad

?>
                                                        <td class="text-center">{{ $sale->total   }}</td>
                                                        <td class="text-center">
                                                        <a class="btn btn-circle" href="{{ route('sale.mirar' , $sale->id) }}">
                                                        <i class="far fa-eye"></i></a>    
                                                        </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $sales->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

