
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Maracas') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    
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
                            <a class="nav-link noma" href="{{ route('customers.index') }}">{{ __('Clientes') }}/</a>
                            <a class="nav-link noma" href="{{ route('sales.index') }}">{{ __('Ventas') }}/</a>
                        <a class="nav-link noma" href="{{ route('sale.ver') }}">{{ __('Detalle de ventas') }}</a>
                        
                        
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
