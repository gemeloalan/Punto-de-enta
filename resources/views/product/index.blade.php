@extends('layouts.principal')

@section('template_title')
Productos
@endsection

@section('content')
<link rel="stylesheet" href="{{asset ('css/main.css') }}">

<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('Productos') }}
                                </span>
                                <div class="float-right">
                                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">

                                        {{ __('Nuevo Producto') }} <i class="far fa-solid fa-plus-square"></i>
                                    </a>
                                    <a href="{{ route('products.pdf') }}" class="btn btn-primary btn-sm float-right"
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
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Imagen</th>
                                            <th class="text-center">Descripcion</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Marca</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product )
                                        <tr>


                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="text-center">{{ $product->nombre }}</td>
                                            {{-- <td class="text-center"><img class="perfil" src="{{ $product->image }}"  width="80px" alt=""></td> --}}
                                            <td class="text-center">
                                                <div class="zoom">
                                                    
                                                <img class="perfil" src="{{ asset('image/' .$product->image) }}"  width="80px" alt="La imagen no esta disponible">
                                                
                                                
                                            </div>
                                        </td>
                                            <td class="text-center ">{{ $product->descripcion }}</td>
                                            <td class="text-center">${{ $product->precio }}
                                                <br>
                                                 c/u
                                                </td>
                                            <td class="text-center">{{ $product->stock }}pzs.</td>
                                            <td class="text-center">${{ $product->total }}.</td>
                                            <td class="text-center">
                                                @isset($product->category->name)

                                                {{ $product->category->name }}
                                                @else <p class="ala">NO hay registro</p>
                                                @endisset

                                            </td>
                                            <td class="text-center">
                                                @isset($product->brand->nombre)

                                                {{ $product->brand->nombre }}
                                                @else <p class="ala">No hay registro</p>
                                                @endisset

                                            </td>
                                            <td>
                                                <a class="btn " href="{{ route('products.show',$product->id) }}"><i
                                                        class="far fa-eye"></i> </a>
                                                <a class="btn " href="{{ route('products.edit',$product->id) }}"><i
                                                        class="far fa-edit"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <a href=""" class=" btn" data-toggle="modal"
                                                    data-target="#deleteMdl{{ $product->id }}">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                {{-- MODAL DE ELIMINAAAR --}}
                                                <!-- Modal -->
                                                <div class="modal animated zoomIn" id="deleteMdl{{$product->id}}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-inspina text-primary text-center"
                                                                    id="exampleModalLabel">Realmente desea borrar el
                                                                    producto <span
                                                                        class="borrado">{{$product->nombre}}</span></h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('products.destroy', $product)}}"
                                                                    role="form" method="POST" id="createProductFrm">
                                                                    @csrf @method('DELETE')
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary mr-1"
                                                                            data-dismiss="modal">Cancelar</button>
                                                                        <button type="submit" href="#"
                                                                            class="btn btn-primary">Borrar
                                                                            Producto</button>
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
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection