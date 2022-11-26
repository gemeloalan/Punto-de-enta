@extends('layouts.principal')

@section('template_title')
    Marcas
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
                                        {{ __('Marcas') }}
                                    </span>
                                     <div class="float-right">
                                        <a href="{{ route('brands.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Nueva Marca') }}
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
                                                    <th class="text-center">Categorias</th>
                                                    <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $brand)
                                                <tr>
                                                    <td class="tex-center">{{ ++$i }}</td>
                                                    
                                                        <td class="tex-center">{{ $brand->nombre }}</td>
                                                        <td class="tex-center">
                                                            @isset($brand->category->name)
                                                               {{ $brand->category->name }}
                                                               @else <p class="ala">Inactivo</p>  
                                                            @endisset
                                                        </td>
                                                        <td class="text-center">
                                                        <a class="btn " href="{{ route('brands.show',$brand->id) }}"><i class="far fa-eye"></i> </a>
                                                        <a class="btn" href="{{ route('brands.edit',$brand->id) }}"><i class="far  fa-edit"></i> </a>
                                                        <a href="btn" class="btn" data-toggle="modal" data-target="#deleteMdl{{ $brand->id }}">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a></td>
                                                        <div class="modal animated zoomIn" id="deleteMdl{{$brand->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content"> 
                                                            <div class="modal-header">
                                                             <h5 class="modal-title text-inspina text-primary text-center" id="exampleModalLabel">Realmente desea borrar la marca:<span class="borrado"> {{$brand->nombre}}</span></h5>
                                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                             </button>
                                                            </div>
                                                            <div class="modal-body">
                                                             <form action="{{route('brands.destroy', $brand)}}" role="form" method="POST" id="createProductFrm">
                                                            @csrf @method('DELETE')
                                                            <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                                                               <button type="submit" href="#" class="btn btn-primary">Borrar Marca</button>
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
                        {!! $brands->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
