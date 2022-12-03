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


    <div class="card badge-dark ">
        <h1 class="uno badge-pill">Lista de productos</h1>
    </div>

<body>
    {{-- <p class="text-center"><img src="{{ asset('fondo.jpg') }}" alt="NO esta"></p> --}}
    <table class="table table-striped table-bordered table-hover dts">
        <thead class="thead">
            <tr>

                <th class="text-center">Nombre</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Total</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Marca</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="text-center">{{ $product->nombre }}</td>
                <td class="text-center">{{ $product->descripcion }}</td>
                <td class="text-center">{{ $product->precio }}</td>
                <td class="text-center">{{ $product->stock }}</td>
                <td class="text-center">{{ $product->total }}</td>
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
                
            </tr>
            @endforeach
        </tbody>
    </table>
    

</body>  
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
<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;</script>