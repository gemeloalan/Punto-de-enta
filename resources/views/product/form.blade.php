<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombre', $product->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? '
            is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('descripcion', $product->descripcion, ['class' => 'form-control' .
            ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::text('precio', $product->precio, ['class' => 'form-control' . ($errors->has('precio') ? '
            is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Stock') }}
            {{ Form::text('stock', $product->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid'
            : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Total') }}
            {{ Form::text('total', $product->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid'
            : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria') }}
            {{ Form::Select('category_id', $categories, $product->category_id, ['class' => 'form-control' .
            ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una Categoria:']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Marca') }}
            {{ Form::select('brand_id', $brands, $product->brand_id, ['class' => 'form-control' .
            ($errors->has('brand_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una Marca:']) }}
            {!! $errors->first('brand_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    {{-- <input type="file" name="image" id="image"> --}}

        <div class="arrastra">
            {{-- <h2>Arrastra y suelta la imagen</h2>
            <span>0</span> --}}
            <button>Selecciona el archivo</button>
        <input type="file" name="image" id="inputFile" hidden required>

        </div>
        <div id="preview"></div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Finalizar</button>
    </div>
</div>
<script>
    const dropArea = document.querySelector(".arrastra");
const dragText = dropArea.querySelector("h2");

const button = dropArea.querySelector("button");
const input = dropArea.querySelector("#inputFile");
 
let files;
 

button.addEventListener('click', (e) => {
    console.log('click');
input.click();
});

input .addEventListener('change', e =>{
   files = this.files;
   dropArea.classList.add("active");
   showFiles(files);
   dropArea.classList.remove("active");

});

dropArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropArea.classList.add("active");
    dragText.textContent = "Suelta archivos para subir";
    
})
dropArea.addEventListener("dragLeave", (e) => {
    dropArea.classList.remove("active");
    dragText.textContent = "Arrrastra y suelta imagenes";


})
dropArea.addEventListener("drop", (e) => {
    e,preventDefault();
    files = e.dataTransfer.files;
    showFiles(files);
    dropArea.classList.remove("active");

    dragText.textContent = "Arrastra y suelta archivos para subir";



})


function showFiles(files){
    if(files.length === undefinded ){
          processFile(files);
    }
  

}

function processFile(file){
   const docType = file.type;
const validaExe = ['image/jpeg','image/jpg','image/png','image/gif'];
if(validaExe.includes(docType)){


    //Archivo valido
}else{
    //No es valido
    alert("Archivo no valido")
}
}


</script>