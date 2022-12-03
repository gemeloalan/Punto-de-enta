<link href="{{ public_path('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text">
<style>
    .uno{
       text-align: center;
       color: black;
   } 
   .card{

   }
   footer {
           position: fixed;
           bottom: 0cm;
           left: 0cm;
           right: 0cm;
           height: 2cm;
           background-color: #2a0927;
           color: white;
           text-align: center;
           line-height: 35px;
       }
</style>
<h1 class="uno badge-dark">Lista de Clientes</h1>
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
<footer>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span class="maquina ">Copyright &copy; Alan Manuel 2022</span>
            <br>
            www.gemeloalan.online
        </div>
    </div>
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
           
    </script>

</footer>