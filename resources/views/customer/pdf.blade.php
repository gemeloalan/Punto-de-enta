<link href="{{ public_path('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text">
<style>
    .uno{
        text-align: center;
        color: black;
    }
</style>
<h1 class="uno">Lista de Clientes</h1>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped ">
            <thead class="thead">
                <tr>

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

                            <td class="text-center">{{ $customer->nombre }}</td>
                            <td class="text-center">{{ $customer->correo }}</td>
                            <td class="text-center">{{ $customer->telefono }}</td>
                            <td class="text-center">{{ $customer->direccion }}</td>


                            <td class="text-center">
                                @isset( $customer->state->nombre)
                                {{ $customer->state->nombre}}
                                @else <p class="ala">No hay registro</p>
                                @endisset
                                
                            
                            </td>
                            <td class="text-center">
                                @isset($customer->municipality->nombre)
                                {{ $customer->municipality->nombre}}
                                @else <p class="ala">NO hay registro</p>  
                              @endisset
                              
                          
                            </td>
                            {{-- <td class="text-center">{{ $customer->municipality_id}}</td> --}}
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>