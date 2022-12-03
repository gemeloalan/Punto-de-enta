@extends('layouts.principal')

@section('template_title')
    Municipios
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
                                        {{ __('Municipio') }}
                                    </span>
                                     <div class="float-right">
                                        <a href="{{ route('municipalities.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                          {{ __('Nuevo Municipio') }}
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
                                    <table class="table table-striped table-bordered table-hover dts" id="dataTable"
                                    width="100%" cellspacing="0">
                                        <thead class="thead">
                                            <tr>
                                                <th class="text-center">Id</th>                                                
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Estado</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($municipalities as $municipality)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    
                                                        <td class="text-center">{{ $municipality->nombre }}</td>
                                                        <td class="text-center">
                                                            
                                                           
                                                            @isset( $municipality->state->nombre)
                                                            {{ $municipality->state->nombre}}
                                                            @else <p class="ala">No hay registro</p>
                                                            @endisset
                                                            
                                                            
                                                        
                                                        
                                                        </td>
                                                    <td class="text-center">
                                                            <a class="btn " href="{{ route('municipalities.show',$municipality->id) }}"><i class="far fa-eye"></i> </a>
                                                            <a class="btn " href="{{ route('municipalities.edit',$municipality->id) }}"><i class="far fa-edit"></i> </a>
                                                           <a class="btn" href="" data-toggle="modal" data-target="#deleteMdl{{ $municipality->id }}"  > <i class="far fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
            
                                            <div class="modal animated zoomIn" id="deleteMdl{{$municipality->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                 <h5 class="modal-title text-inspina text-primary text-center" id="exampleModalLabel">Realmente desea borrar el municipio<span class="borrado"> {{$municipality->nombre}}</span></h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                                </div>
                                                <div class="modal-body">
                                                 <form action="{{route('municipalities.destroy', $municipality)}}" role="form" method="POST" id="createProductFrm">
                                                @csrf @method('DELETE')
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                                                   <button type="submit" href="#" class="btn btn-primary">Borrar Municipio</button>
                                                 </div>
                                                </div>
                                                </div>
                                                </div>
            
                                                </form>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {!! $municipalities->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
