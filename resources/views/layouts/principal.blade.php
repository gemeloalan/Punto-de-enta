

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Maracas') }}</title>
<style>
    
</style>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

@yield('contenido')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-layers"></i> --}}
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <i class="far <i class="fas fa-bed"></i></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Maracas') }}     </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Modulos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Selecciona:</h6>
                        <a class="collapse-item" href="{{ route('categories.index') }}">Categorias</a>
                        <a class="collapse-item" href="{{ route('brands.index') }}">Marcas</a>
                        <a class="collapse-item" href="{{route ('products.index') }}">Productos</a>
                    </div>
                </div>
            </li>
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Clientes:</h6>
                        <a class="collapse-item" href="{{ route('states.index') }}">Estados</a>
                        <a class="collapse-item" href="{{ route('municipalities.index') }}">Municipios</a>
                        <a class="collapse-item" href="{{ route('customers.index') }}">Clientes</a>
                      {{--   <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a> --}}
                    </div>
                </div>
            </li>

            <!-- Divider -->
              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ventas</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Selecciona:</h6>
                        <a class="collapse-item" href="{{ route('sales.index') }}">Ventas</a>
                        {{-- <a class="collapse-item" href="{{ route('sale.ver') }}">Detalle de Ventas</a> --}}
                        <a class="collapse-item" href="{{ route('images.index') }}">Imagenes</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">


              <!-- Sidebar Toggler (Sidebar) -->
              <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>

            <!-- Heading -->
           {{--  <div class="sidebar-heading">
                Addons
            </div>
 --}}
          
            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
           
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

{{--       @yield('froms')
 --}}                     <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small " placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                                
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                
                            </div>
                        </div>
                    </form>                      
                      {{-- <div class="lds-hourglass"></div> --}}

                    @include('layouts.menu')

                    <!-- Topbar Navbar -->
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
@include('layouts.app')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    

    <!-- Logout Modal-->
    

    <!-- Bootstrap core JavaScript-->

    <script src={{('jquery/jquery.min.js')}}></script>
    
    <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{asset ('css/main.css') }}">

    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    
    <script src="{{ asset('js/ventas.js') }}"></script>

    <!-- Page level plugins -->
{{--     <script src="vendor/chart.js/Chart.min.js"></script>
 --}}
    <!-- Page level custom scripts -->
   {{--  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> --}}

</body>

</html>
