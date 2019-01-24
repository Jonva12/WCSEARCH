@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>{{$usuario->name}}</h1>
				<p><strong>Email:</strong> {{$usuario->email}}</p>
				<p><strong>Nivel:</strong> {{$usuario->role->nombre}}</p>
				<p><strong>Puntuacion:</strong> {{$usuario->puntuacion}}</p>
				@if($usuario->id==Auth::user()->id)
					<a href="{{route('usuario.ajustes')}}"><button class="btn btn-info">Ajustes</button></a>
				@endif
			</div>
			<div class="col-md-8">
				@if($usuario->id==Auth::user()->id)
					<h2>Tus aseos</h2>
				@else
					<h2>Sus aseos</h2>
				@endif
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Aseo</th>
								<th>Direccion</th>
								<th>Comentarios</th>
								<th>Reportes</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
								@if($usuario->aseos->count()==0)
								<tr>
									<td colspan="5">
										@if($usuario->id==Auth::user()->id && $usuario->role->nombre=="normal")
											Necesitas mas nivel para poder crear tus propios baños
										@elseif($usuario->id==Auth::user()->id )
											Todavia no has creado ningun aseo, tienes opcion de crear un 1 aseo. Con 100 puntos aseos ilimitados.
										@else
											No has creado ningun aseo, tienes opcion de crear un 1 aseo sin tener 100 puntos.
										@endif
									</td>
								</tr>
								@else
									@foreach($usuario->aseos as $a)
                    @if($a->oculto == null)
										<tr>
											<td>{{$a->nombre}}</td>
											<td>{{$a->dir}}</td>
											<td>{{$a->comentarios->count()}}</td>
											<td>{{$a->reportes->count()}}</td>
											<td>
												<a class="btn btn-primary" href="">Ver</a>
												<a class="btn btn-danger" onclick="return confirm('¿Estas seguro?')" href="{{route('wc.ocultar', $a->id)}}">Eliminar</a>
											</td>
										</tr>
                    @endif
									@endforeach
								@endif
						</tbody>
					</table>
			</div>
		</div>
</div>
	@endsection
