<link href="{{ public_path('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text">
<style>
    .uno{
        text-align: center;
        color: black;
    }
</style>
<h1 class="uno">Lista de Productos</h1>
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
  