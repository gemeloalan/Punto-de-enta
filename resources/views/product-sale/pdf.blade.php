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
            
            
                <th class="text-center">Id-venta</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Descuento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productSales as $productSale)
            <tr>
                
                    <td class="text-center">{{ $productSale->sale_id }}</td>
                    <td class="text-center">{{ $productSale->product->nombre }}</td>
                    <td class="text-center">{{ $productSale->cantidad }}</td>
                    <td class="text-center">{{ $productSale->precio }}</td>
                    <td class="text-center">{{ $productSale->descuento }}%</td>
                    
            </tr>
        @endforeach
    </tbody>
</table>
  