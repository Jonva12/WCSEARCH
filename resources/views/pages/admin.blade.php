  @extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
  <div class="botones">
	<a href="{{ route('admin.usuarios') }}">
		<div class="boton">
			<i class="fas fa-users"></i>
			<p>
				<b>{{$usuarios}}</b> @lang('adminContent.users')
			</p>
		</div>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<div class="boton">
			<i class="fas fa-map-marker-alt"></i>
			<p>
				<b>{{$aseos}}</b> @lang('adminContent.wc')
			</p>
		</div>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<div class="boton">
			<i class="far fa-envelope"></i>
			<p>
				<b>{{$message}}</b> @lang('adminContent.comments')
			</p>
		</div>
	</a>
	</div>
@endsection