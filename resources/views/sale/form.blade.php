<div class="box box-info padding-1">
    <div class="box-body">
            <div class="form-group">
                {{ Form::label('Clientes') }}
                {{ Form::select('customer_id',$customers, $sale->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''),  'placeholder' => 'Selecciona un cliente:']) }}
                {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        <div class="form-group">
            {{ Form::label('Productos') }}
            {{ Form::select('product_id', $products , $sale->product_id, [ 'class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Producto:']) }}
            <small id="helpId" class="form-text text-muted">Piezas Disponibles
                {{-- @foreach ($products as $object)
                @foreach($object->products as $orden_examen)
                <br>
                   {{ $orden_examen->products->stock }}
                @endforeach
             @endforeach --}}
             
</small>

            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <div class="form-group">
              <label for="">total</label>
              <input type="select"  disabled class="form-control" name="" id="Cantidad disponible" aria-describedby="helpId" value="{{ $sale->product_id }}">
            </div>
        </div>
      
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $sale->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       
        <div class="form-group">
            {{ Form::label('Total ($)') }}
            {{ Form::number('total', $sale->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => ' $']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::select('status', $sale->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Finalizar</button>
    </div>
</div>