@extends('layouts.principal')

@section('template_title')
    {{ $brand->name ?? 'Show Brand' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Marcas</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary " href="{{ route('brands.index') }}"> Regresar
                                <i class="fas fa-left"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $brand->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            @isset($brand->category->name)
                            {{ $brand->category->name }}
                            @else <p class="ala">No hay Registro</p>  
                         @endisset                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
