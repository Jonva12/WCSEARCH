<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
          <img src="/img/logo.png" alt="WCSearch" id="icon" class="rounded float-left">
       		<div class="dropdown nav navbar-nav navbar-right">
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
				<div class="dropdown-menu" aria-labelledby="usuarioMenu">
					<a class="dropdown-item" href="#">Notificaciones</a>
					<a class="dropdown-item" href="#">Cerrar sesion</a>
				</div>
			</div>
      </div>
    </nav>
