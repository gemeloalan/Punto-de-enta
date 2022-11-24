@extends('layouts.principal')

@section('template_title')
    {{ $customer->name ?? 'Show Customer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Clientes
                            </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $customer->state->nombre  }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $customer->municipality->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $customer->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $customer->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $customer->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $customer->direccion }}
                        </div>
                      

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
