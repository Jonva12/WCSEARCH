<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/img/logo.png" alt="WCSearch" id="icon" class="rounded float-left">
            {{__('WCSEARCH')}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item" id="notificaciones_nav">
                        <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" class="link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" class="link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ strtoupper(Auth::user()->name) }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('change_lang', ['lang' => 'es']) }}">ES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
