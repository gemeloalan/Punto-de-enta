<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item menu">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia Sesión') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrate') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item menu dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end salir-login " aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Salir weon') }}  <i class="far fa-arrow-alt-circle-right">  </i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
<link rel="stylesheet" href="{{asset ('css/main.css') }}">
