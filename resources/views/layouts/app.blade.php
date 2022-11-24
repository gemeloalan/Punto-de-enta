
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Maracas') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check())
                    

                    
                        
                    
                    <ul class="navbar-nav me-auto">
                       
                            <a class="nav-link noma" href="{{ route('categories.index') }}">{{ __('Categorias') }}/</a>
                            <a class="nav-link noma" href="{{ route('brands.index') }}">{{ __('Marcas') }}/</a>
                            <a class="nav-link noma" href="{{ route('products.index') }}">{{ __('Productos') }}/</a>
                            <a class="nav-link noma" href="{{ route('states.index') }}">{{ __('Estados') }}/</a>
                            <a class="nav-link noma" href="{{ route('municipalities.index') }}">{{ __('Municipios') }}/</a>
                            <a class="nav-link noma" href="{{ route('customers.index') }}">{{ __('Clientes') }}</a>
                        
                        
                    </ul>

                    @endif
                    

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>

        
            @yield('content')
        
            @include('sweetalert::alert')
    </div>
           <!-- Footer -->
           <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span class="maquina ">Copyright &copy; Alan Manuel 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

</body>

</html>
