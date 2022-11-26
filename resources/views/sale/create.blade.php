@extends('layouts.principal')

@section('template_title')
Vender
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Ventas</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('states.index') }}"> Regresar <i class="fa-solid fa-arrow-left-long"></i></a>
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
