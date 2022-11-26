@extends('layouts.principal')

@section('template_title')
    Ventas
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span id="card_title">
                                        {{ __('Ventas') }}
                                    </span>
                                     <div class="float-right">
                                        <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Generar Venta') }}
                                        </a>
                                      </div>
                                      
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dts">
                                        <thead class="thead">
                                            <tr>
                                                <th>No</th>
                                                
                                                    <th>Cliente</th>
                                                    <th>Producto</th>
                                                    <th>Fecha</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    
                                                        <td>{{ $sale->customer->nombre }}</td>
                                                        <td>{{ $sale->product->nombre }}</td>
                                                        <td>{{ $sale->fecha }}</td>
                                                        <td>{{ $sale->total }}</td>
                                                        <td>{{ $sale->status }}</td>
                                                    <td>
                                                        <form action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                                                           
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn "><i class="far  fa-trash-alt"></i> </button>
                                                        <a class="btn " href="{{ route('sales.show',$sale->id) }}"><i class="far fa-eye"></i> </a>
                                                            <a class="btn " href="{{ route('sales.edit',$sale->id) }}"><i class="far fa-edit"></i> </a>
                                                       
                                                        </form> 
                                                       
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $sales->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
