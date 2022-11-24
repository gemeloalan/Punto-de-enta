@extends('layouts.principal')

@section('template_title')
    Nueva Categoria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nueva Categoria</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categories.index') }}"> Regresar<i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('category.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
