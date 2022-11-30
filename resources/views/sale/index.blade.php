@extends('layouts.principal')

@section('template_title')
    Sale
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
                                          {{ __('Realizar una venta') }}
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
                                                
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Clientes</th>
                                                    <th class="text-center">Productos</th>
                                                    <th class="text-center">Fecha</th>
                                                    <th class="text-center">Total</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $sale)
                                                <tr>
                                                   
                                                    
                                                        <td class="text-center">{{ ++$i }}</td>
                                                        <td class="text-center">{{ $sale->customer->nombre }}</td>
                                                        <td class="text-center">{{ $sale->product->nombre }}</td>
                                                        <td class="text-center">{{ $sale->created_at }}</td>
                                                        <td class="text-center">$   {{ $sale->total }}</td>
                                                        <td class="text-center">{{ $sale->status }}</td>
                                                    <td>
                                                            <a class="btn " href="{{ route('sales.show',$sale->id) }}"><i class="far fa-eye"></i> </a>
                                                            <a class="btn" href="{{ route('sales.edit',$sale->id) }}"><i class="far fa-edit"></i> </a>
                                                            <a class="btn" data-toggle="modal" data-target="#deleteMdl{{ $sale->id }}" "><i class="far fa-trash-alt"></i></a>
                                                            <div class="modal animated zoomIn" id="deleteMdl{{$sale->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                 <h5 class="modal-title text-inspina text-primary text-center" id="exampleModalLabel">Realmente desea borrar la venta:<span class="borrado"> {{$sale->id}} de {{ $sale->customer->nombre }}</span></h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                   <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                 <form action="{{route('sales.destroy', $sale->id)}}" role="form" method="POST" id="createProductFrm">
                                                                @csrf @method('DELETE')
                                                                <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                                                                   <button type="submit" href="#" class="btn btn-primary">Borrar venta</button>
                                                                 </div>
                                                                </div>
                                                                </div>
                                                                </div>
                    
                                                                </form>
                                                                </div>
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
<script src="{{ asset('ventas') }}"></script>