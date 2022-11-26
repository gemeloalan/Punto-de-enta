@extends('layouts.principal')

@section('template_title')
    Update Product Sale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Product Sale</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product-sale.update', $productSale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('product-sale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
