<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $customer->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::text('correo', $customer->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $customer->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::textarea('direccion', $customer->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion del cliente']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('state_id') }}
            {{ Form::select('state_id', $states, $customer->state_id, ['class' => 'form-control' . ($errors->has('state_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Estado:']) }}
            {!! $errors->first('state_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipality_id') }}
            {{ Form::select('municipality_id', $municipalities, $customer->municipality_id, ['class' => 'form-control' . ($errors->has('municipality_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Municipio:']) }}
            {!! $errors->first('municipality_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="arrastra">
             <h2>Arrastra y suelta la imagen</h2>
            <span>0</span> 
            <button>Selecciona el archivo</button>
            <input type="file" name="image" id="inputFile" value="{{ $customer->image }}" hidden required>
            @if ($errors->has('image'))
                
                <span class="text-danger">{{$errors->first('image')}}</span>
                @endif

        </div>
        <div class="preview"></div>
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
    
});
dropArea.addEventListener("dragleave", (e) => {
    dropArea.classList.remove("active");
    dragText.textContent = "Arrrastra y suelta imagenes";


});
dropArea.addEventListener("drop", (e) => {
    e,preventDefault();
    files = e.dataTransfer.files;
    showFiles(files);
    dropArea.classList.remove("active");

    dragText.textContent = "Arrastra y suelta archivos para subir";



});


function showFiles(files){
    if(files.length === undefinded ){
          processFile(files);
    }
  

}


// desde aqui papu si ya no jala XD
/* function processFile(file){
   const docType = file.type;
const validaExe = ['image/jpeg','image/jpg','image/png','image/gif'];
if(validaExe.includes(docType)){
    //Archivo valido
    const fileReader = new fileReader();
    const id = ´file-${Math.random().toString(32).subString(7)}´;
    fileReader.addEventListener('load', e =>{

    }); 



}else{
    //No es valido
    alert("Archivo no valido")
}
} */


</script>