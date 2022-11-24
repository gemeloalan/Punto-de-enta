@extends('layouts.principal')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Productos
                            </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $product->category->name }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $product->brand->nombre }}
                        </div>
                        
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $product->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $product->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $product->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $product->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $product->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
