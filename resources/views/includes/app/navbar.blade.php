<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}" id="navbarDropdown">
          <img src="/img/logo.png" alt="WCSearch" id="icon" class="rounded float-left">
            {{__('WCSEARCH')}}
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" class="link" href="{{ route('login') }}">@lang('navbar.startSession')</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a id="navbarDropdown" class="nav-link" class="link" href="{{ route('register') }}">@lang('navbar.register')</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item">
                      <a id="createWC" class="nav-link" class="link" href="{{route('wc.form')}}">@lang('navbar.createWC')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre id="notificaciones_nav" onclick="getNotificaciones()"><i class="fa fa-bell"></i></a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="notificaciones">

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ strtoupper(Auth::user()->name) }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('usuario.perfil', Auth::user()->id) }}">
                                @lang('navbar.profile')
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                @lang('navbar.endSession')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link" href="{{ route('change_lang', ['lang' => 'es']) }}">ES </a>
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link" href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
