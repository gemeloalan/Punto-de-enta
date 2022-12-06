@extends('layouts.principal')

@section('template_title')
    {{ $municipality->name ?? 'Show Municipality' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Municipios
                            </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('municipalities.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $municipality->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @isset( $municipality->state->nombre)
                            {{ $municipality->state->nombre}}
                            @else <p class="ala">No hay registro</p>
                            @endisset
                                                    </div>

                    </div>
                </div>
                {!! $municipalities->links() !!}

            </div>
        </div>
    </section>
@endsection
