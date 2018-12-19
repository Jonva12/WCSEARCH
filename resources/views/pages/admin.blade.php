  @extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
  <div class="botones">
	<a href="{{ route('admin.usuarios') }}">
		<div class="boton">
			<i class="fas fa-users"></i>
			<p>
				<b>{{$usuarios}}</b> Usuarios
			</p>
		</div>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<div class="boton">
			<i class="fas fa-map-marker-alt"></i>
			<p>
				<b>{{$aseos}}</b> Aseos
			</p>
		</div>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<div class="boton">
			<i class="far fa-envelope"></i>
			<p>
				<b>{{$message}}</b> Mensajes
			</p>
		</div>
	</a>
	</div>
@endsection