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
<h1 class="uno">Detalle de ventas</h1>
<table class="table table-striped table-bordered table-hover dts">
    <thead class="thead">
        <tr>
            
            
                <th class="text-center">Id-venta</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                
                    <td class="text-center">{{ $sale->id }}</td>

                    <td class="text-center">
                        @isset( $sale->product->nombre )
                        {{ $sale->product->nombre }}
                        @else
                        <p class="ala">No hay registro de Producto</p>
                            
                        @endisset
                    </td>
                    <td class="text-center">{{ $sale->cantidad }}</td>
                    <td class="text-center">
                        @isset( $sale->product->precio )
                        {{ $sale->product->precio }}
                        @else
                        <p class="ala">No hay registro de Producto</p>
                            
                        @endisset
                     </td>
                    <td class="text-center">{{ $sale->total }}</td>
                    
            </tr>
        @endforeach
    </tbody>
</table>
<footer>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span class="maquina ">Copyright &copy; Alan Manuel 2022</span>
            <br>
            www.gemeloalan.online
        </div>
    </div>

</footer>
  
        <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
       
</script>
  