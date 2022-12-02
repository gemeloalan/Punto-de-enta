@extends('layouts.principal')

@section('template_title')
    Detalle de Ventas
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
                                        {{ __('Detalle de Ventas
                                        ') }}
                                    </span>
                                     {{-- <div class="float-right">
                                        <a href="{{ route('product-sale.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Agr') }}
                                        </a>
                                      </div> --}}
                                      <div class="float-right">
                                        <a href="{{ route('product-sales.pdf') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="far fa-solid fa-file-pdf"></i>
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
                                                    <th class="text-center">Id-venta</th>
                                                    <th class="text-center">Producto</th>
                                                    <th class="text-center">Cantidad</th>
                                                    <th class="text-center">Precio</th>
                                                    <th class="text-center">Descuento</th>
                                                    <th class="text-center">Total</th>
                                                    <th>Ver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productSales as $productSale)
                                                <tr>
                                                    
                                                        <td class="text-center">{{ ++$i }}</td>
                                                        <td class="text-center">{{ $productSale->sale_id }}</td>
                                                        <td class="text-center">{{ $productSale->product->nombre }}</td>
                                                        <td class="text-center">{{ $productSale->cantidad }}pzs.</td>
                                                        <td class="text-center">${{ $productSale->precio }}</td>
                                                        <td class="text-center">{{ $productSale->descuento }}%</td>
                                                        <td class="text-center">
                                                            <a class="btn " href="{{ route('product-sale.show',$productSale->id) }}"><i class="far fa-eye"></i> </a>
                                                            {{-- <form action="{{ route('product-sale.destroy',$productSale->id) }}" method="POST">
                                                            <a class="btn " href="{{ route('product-sale.edit',$productSale->id) }}"><i class="far fa-edit"></i> </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn "><i class="far fa-trash-alt"></i> </button>
                                                        </form> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $productSales->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
