@extends('layouts.principal')

@section('template_title')
    {{ $sale->name ?? 'Show Sale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title float-end">Detalle de la venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $sale->customer->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $sale->product->nombre }} 
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                             ${{ $sale->product->precio }}c/u
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $sale->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sale->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $sale->total }}
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
