<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::select('category_id', $categories, $brand->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una Categoria:']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> 

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $brand->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Finalizar</button>
    </div>
</div>