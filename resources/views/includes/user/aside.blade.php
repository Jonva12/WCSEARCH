<ul>
	<a href="{{ route('home') }}">
		<li><i class="fas fa-home"></i> Inicio</li>
	</a>
	<a href="{{ route('usuario.perfil',$usuario->id) }}">
		<li><i class="fas fa-users"></i> Perfil</li>
	</a>
	<a href="">
		<li><i class="fa fa-bell"></i> Notificaciones</li>
	</a>
</ul>
