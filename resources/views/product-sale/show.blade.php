@extends('layouts.principal')

@section('template_title')
    {{ $productSale->name ?? 'Show Product Sale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles de ventas</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product-sale.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>ID venta:</strong>
                            #{{ $productSale->sale_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $productSale->sale->status }}.
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $productSale->product->nombre }}.
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $productSale->cantidad }}pzs.
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                           $ {{ $productSale->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $productSale->descuento }}%
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            $ {{ $productSale->product->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
