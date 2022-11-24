@extends('layouts.principal')

@section('template_title')
    Create Brand
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nueva Marca</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('brands.index') }}"> Regresar<i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('brands.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('brand.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
