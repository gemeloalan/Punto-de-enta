<div class="card">
    <div class="card-body">
        <div class="box box-info padding-1">
            <div class="box-body">
        
        
        
                {{-- Input de clienteeee --}}
         
                <div class="form-group" >
                    <label for="customer_id">Cliente: </label>
                    <select class="form-control" name="customer_id" id="customer_id"   >
                        <option value="" disabled selected >Selecciona un cliente:</option>
                    @foreach ($customers as $customer)
                    <option value="{{$customer->id}}" placeholder="Selecciona un Cliente">{{$customer->nombre}}</option>
                    @endforeach

                    </select>
        
                    </div>

        
                <div class="form-group" >
                    <label for="product_id">Producto</label>
                    <select class="form-control" name="product_id" id="product_id"   placeholder="Selecciona un Producto:">
                        <option value="" disabled selected>Selecciona un producto:</option>
                    @foreach ($products as $product)
                    <option value="{{$product->id}}_{{$product->stock}}_{{$product->precio}}" placeholder="Selecciona un producto">{{$product->nombre}}--Cantidad.{{$product->stock}}--${{$product->precio}}</option>
                    @endforeach

                    </select>
                    <small id="helpId" class="form-text text-muted">Stock: {{ $product->stock }} </small>
        
                    </div>

                   


                    
                    <div class="form-group">
                      <label for="cantidad">Cantidad</label>
                      <input type="number"
                        class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder="Escribe la cantidad de productos que deseas vender">
                    </div>
                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <input type="number"
                        class="form-control" disabled name="precio" id="precio" aria-describedby="helpId" placeholder="Se mostrara el precio del producto.">
                    </div>
                    
        
        
                    <div class="box-footer mt20">
                        <button type="submit" id="agregar" class="btn btn-primary float-right">Agregar</button>
                    </div>
                </div>
        
        
        <br>
        <hr>
        
                <div class="card">
                    <div class="form-group">
                    <h4 class="card-title text-center ">Detalles de venta</h4>
                    <div class="table-responsive col-md-12">
                        <table id="detalles" class="table table-hover table-bordered table-striped-columns ">
                    <thead>
        
        
                        <tr>
                    <th class="text-center">Eliminar</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Precio($)</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Subtotal</th>
                    <th class="text-center">Total</th>
                        </tr>
                    </thead>
        
                    <tfoot>
                        <tr>
                    <th colspan="5">
                        <p align="right">Total:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total"> $ 0.00</span></p>
                    </th>
        
                        </tr>
                        <tr >
                    <th colspan="5">
                        <p align="right">Impuesto 18% :</p>
                    </th>
                    <th>
                        <p align="right"> <span  id="total_impuesto"> $ 0.00 </span></p>
                    </th>
                        </tr>
                        <tr id="dvOcultar">
                    <th colspan="5">
                        <p align="right">Total a pagar :</p>
                    </th>
                    <th>
                        <p align="right"> <span align="right"  id="total_pagar_html"> $ 0.00
        
                        <input type="hidden" name="total" id="total_pagar" value="">
                        </span></p>
                    </th>
                        </tr>
                    </tfoot>
                        </table>
                    </div>
                    </div>
                </div>
        
        
            </div>
    </div>
</div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Finalizar</button>
    </div>
</div>
