@extends('layout.user')

  @section('title', 'WCSearch')

  @section('content')
  <div class="botones">
	<a href="{{ route('usuario.perfil',$usuario) }}">
		<div class="boton">
			<i class="fas fa-users"></i>
			<p>
				<b>{{$usuario}}</b> Perfil
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
			<i class="far fa-envelope"></i>
			<p>
				<b></b> Mensajes
			</p>
		</div>
	</a>
	</div>
@endsection