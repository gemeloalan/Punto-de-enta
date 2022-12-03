
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Imagenes</title>
</head>
<body>
    <style>
        #hola{
            padding-left: 30%;
        }
        .😊{
            color: red;
            size: 8px;
        }
        .fondo{
            background-image: url('fondo.jpg');
        }
    </style>
    
    
    <h1 style="text-align: center">Bienvenido</h1>
    <br>
    <div class="card badge-dark fondo">
        <div id="hola" class="col-lg-12 row">
            <div  class="p-md-3 col-lg-8 card">
                <div class="card-body">
        
                    <form action="{{ route('images.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div  class="form-group">
                      <label for="image">Selecciona una imagen</label>
                      <input type="file"
                        class="form-control-file " name="image" id="image" aria-describedby="Selecciona tu mejor imagen." value="{{ old('image') }}" placeholder="image">
                        @if ($errors->has('image'))
                        <span class="text-danger">{{$errors->first('image')}}</span>
        
                        @endif
                    </div>
                    <hr class="😊">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    
    
    @include('sweetalert::alert')

</body>
</html>


