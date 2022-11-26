@extends('layouts.principal')

@section('template_title')
    Cliente
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
                                        {{ __('Cliente') }}
                                    </span>
                                     <div class="float-right">
                                        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                          {{ __('Nuevo Usuario') }} <i class="far fa-solid fa-plus-square"></i>
                                        </a>
                                        <a href="{{ route('customers.pdf') }}" class="btn btn-primary btn-sm float-right"
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
                                    <table class="table table-striped table-bordered     table-hover dts">
                                        <thead class="thead">
                                            <tr>
            
                                                <th class="text-center">No</th>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Correo</th>
                                                    <th class="text-center">Telefono</th>
                                                    <th class="text-center">Direccion</th>
                                                    <th class="text-center">Estado  </th>
                                                    <th class="text-center">Municipio  </th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $customer)
                                                <tr>
            
                                                    <td class="text-center">{{ ++$i }}</td>
                                                        <td class="text-center">{{ $customer->nombre }}</td>
                                                        <td class="text-center">{{ $customer->correo }}</td>
                                                        <td class="text-center">{{ $customer->telefono }}</td>
                                                        <td class="text-center">{{ $customer->direccion }}</td>


                                                        <td class="text-center ">
                                                            @isset( $customer->state->nombre)
                                                            {{ $customer->state->nombre}}
                                                            @else <p class="ala">No hay registro</p>
                                                            @endisset
                                                            
                                                        
                                                        </td>
                                                        <td class="text-center ">
                                                            @isset($customer->municipality->nombre)
                                                              {{ $customer->municipality->nombre}}
                                                              @else <p class="ala">NO hay registro</p>  
                                                            @endisset
                                                            
                                                        
                                                        </td>
                                                        {{-- <td class="text-center">{{ $customer->municipality_id}}</td> --}}
                                                    <td class="text-center col-sm-3">
                                                            <a class="btn  " href="{{ route('customers.show',$customer->id) }}"><i class="far fa-eye"></i> </a>
                                                            <a class="btn " href="{{ route('customers.edit',$customer->id) }}"><i class="far fa-edit"></i> </a>
                                                           <a  class="btn" data-toggle="modal" data-target="#deleteMdl{{ $customer->id }}" "> <i class="far fa-trash-alt "></i></a>
                                                    </td>
                                                    <div class="modal animated zoomIn" id="deleteMdl{{$customer->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                         <h5 class="modal-title text-inspina text-primary text-center" id="exampleModalLabel">Realmente desea borrar al cliente<span class="borrado"> {{$customer->nombre}}</span></h5>
                                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                         </button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form action="{{route('customers.destroy', $customer)}}" role="form" method="POST" id="createProductFrm">
                                                        @csrf @method('DELETE')
                                                        <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancelar</button>
                                                           <button type="submit" href="#" class="btn btn-primary">Borrar Cliente</button>
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
                        {!! $customers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
