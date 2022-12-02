<link href="{{ public_path('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text">
<style>
    .uno{
        text-align: center;
        color: black;
    }
</style>
<h1 class="uno">Detalle de ventas</h1>
<table class="table table-striped table-bordered table-hover dts">
    <thead class="thead">
        <tr>
            
                <th class="text-center">No</th>
                <th class="text-center">Clientes</th>
                <th class="text-center">Productos</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Total</th>
                <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
               
                
                    <td class="text-center">{{ /* ++$isa */ $sale->id }}</td>

                    <td class="text-center">
                        @isset( $sale->customer->nombre )
                        {{ $sale->customer->nombre }}
                        @else
                        <p class="ala">Cliente inactivo</p>
                        @endisset
                    </td>
                    <td class="text-center">
                        @isset( $sale->product->nombre )
                        {{ $sale->product->nombre }}
                        @else
                        <p class="ala">Producto inactivo</p>
                            
                        @endisset</td>
                    <td class="text-center">
                        @isset( $sale->product->precio )
                        {{ $sale->product->precio }}
                        @else
                        <p class="ala">Precio inactivo</p>
                            
                        @endisset
                    </td>
                    <td class="text-center">{{ $sale->created_at }}</td>
<?php 
//$total  = $sale->product->precio * $sale->cantidad

?>
                    <td class="text-center">   {{ $sale->cantidad }}</td>
                    <td class="text-center">{{ $sale->total   }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>