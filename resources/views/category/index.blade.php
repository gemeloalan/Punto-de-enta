@extends('layouts.principal')

@section('template_title')
    Categorias
@endsection

@section('content')
    <div class="card shadow mb-8">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span id="card_title">
                                        {{ __('Categorias') }}
                                    </span>
                                     <div class="float-right">
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Nueva Categoria') }}
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
                                                <th class="text-center">ID</th>
                                                
                                                    <th class="text-center">Nombre</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    
                                                        <td class="text-center">{{ $category->name }}</td>
                                                    <td class="text-center">
                                                        <a class="btn  " href="{{ route('categories.show',$category->id) }}"><i class="far fa-eye"></i> </a>
                                                        <a class="btn " href="{{ route('categories.edit',$category->id) }}"><i class="far fa-edit"></i> </a>
                                                        <a href="" class="btn" data-target="#deleteMdl{{ $category->id }}"  data-toggle="modal" href="{{ route('categories.destroy', $category->id) }}"><i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                        @csrf
                                                        <div class="modal animated zoomIn" id="deleteMdl{{$category->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content"> 
                                                            <div class="modal-header">
                                                             <h5 class="modal-title text-inspina text-primary text-center" id="exampleModalLabel">Realmente desea borrar la categoria:<span class="borrado"> {{$category->name}}</span></h5>
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                             </button>
                                                            </div>
                                                            <div class="modal-body">
                                                             <form action="{{route('categories.destroy', $category)}}" role="form" method="POST" id="createProductFrm">
                                                            @csrf @method('DELETE')
                                                            <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                                                               <button type="submit" href="#" class="btn btn-primary">Borrar Producto</button>
                                                             </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            
                                                            </form>
                                                            </div>
                                                           
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
