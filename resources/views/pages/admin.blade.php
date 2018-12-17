  @extends('layout.layoutadmin')

  @section('title', 'WCSearch')

  @section('content')
  <div class="botones">
	<a href="">
		<div class="boton">
			<i class="fas fa-users"></i>
			<p>
				<b>{{$usuarios}}</b> Usuarios
			</p>
		</div>
	</a>
	<a href="">
		<div class="boton">
			<i class="fas fa-map-marker-alt"></i>
			<p>
				<b>{{$aseos}}</b> Aseos
			</p>
		</div>
	</a>
	<a href="">
		<div class="boton">
			<i class="far fa-envelope"></i>
			<p>
				<b>{{$message}}</b> Mensajes
			</p>
		</div>
	</a>
	</div>
@endsection