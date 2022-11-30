@extends('layouts.principal')

@section('template_title')
    {{ $state->name ?? 'Show State' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"> Estados</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('states.index') }}"> Regresar <i class="fa-solid fa-arrow-left-long"></i></a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $state->nombre }} <br>
                          
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
