<ul>
	<a href="{{ route('home') }}">
		<li><i class="fas fa-home"></i>@lang('aside.home')</li>
	</a>
	<a href="{{ route('usuario.perfil',Auth::user()->id) }}">
		<li><i class="fas fa-users"></i> Perfil</li>
	</a>
	<a href="{{ route('usuario.notificaciones') }}">
		<li><i class="fa fa-bell"></i> Notificaciones</li>
	</a>
</ul>
