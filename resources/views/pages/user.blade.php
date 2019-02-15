@extends('layout.user')

  @section('title', 'WCSearch')

  @section('content')
  <div class="botones">
	<a href="{{ route('usuario.perfil',$usuario->id) }}">
		<div class="boton">
			<i class="fas fa-users"></i>
			<p>
				<b>{{$usuario->nombre}}</b> Perfil
			</p>
		</div>
	</a>
	<a href="">
		<div class="boton">
			<i class="fas fa-map-marker-alt"></i>
			<p>
				<b></b> Aseos
			</p>
		</div>
	</a>
	<a href="">
		<div class="boton">
			<i class="fa fa-bell"></i>
			<p>
				<b></b> Notificaciones
			</p>
		</div>
	</a>
	</div>
@endsection
