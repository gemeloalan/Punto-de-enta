@extends('layouts.principal')

@section('template_title')
   Ventas
@endsection

@section('content')
    <section class="content badge-dark">
        <div class="row badge-info">
            <br>
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header ">
                        <span class="card-title">Nueva Venta</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales.create') }}"> Cancelar Venta</a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales.index') }}"> Regresar<i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
