@extends('layouts.principal')


@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('BIENVENIDO!!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido a Maracas ') }}            :     <strong>{{ Auth::user()->name }}</strong>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
