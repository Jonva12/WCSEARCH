@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
    @if(Session::has('status'))
      <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }}"><div>{{ Session::get('status') }}</div><i id="x" class="fas fa-times" onclick="cerrar()"></i></div>
    @endif
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
				<div>
				    <form action="{{route('usuario.perfil', $usuario->id)}}" method="get">
				    	<input type="text" name="nombre" placeholder="Nombre de aseo">
				    	<input type="text" name="direccion" placeholder="Direccion">
				    	<input type="submit" value="Filtrar">
				    </form>
				</div>
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
								@if($aseos->count()==0)
								<tr>
									<td colspan="5">
										@if($usuario->id==Auth::user()->id && $usuario->role->nombre=="normal")
											Puedes crear 1 baño. Para crear baños ilimitados necesitas ser golden.
										@elseif($usuario->id==Auth::user()->id )
											Todavia no has creado ningun aseo, tienes opcion de crear un 1 aseo. Con 100 puntos aseos ilimitados.
										@else
											No has creado ningun aseo, tienes opcion de crear un 1 aseo sin tener 100 puntos.
										@endif
									</td>
								</tr>
								@else
									@foreach($aseos as $a)

										<tr>
											<td>{{$a->nombre}}</td>
											<td>{{$a->dir}}</td>
											<td>{{$a->comentarios->count()}}</td>
											<td>{{$a->reportes->count()}}</td>
											<td>
												<a class="btn btn-primary" href="{{route('home',['latitud'=>$a->latitud, 'longitud'=>$a->longitud])}}">Ver</a>
												<a class="btn btn-danger" onclick="return confirm('¿Estas seguro?')" href="{{route('wc.ocultar', $a->id)}}">Eliminar</a>
											</td>
										</tr>
									@endforeach
								@endif
						</tbody>
					</table>
			</div>
		</div>
</div>
	@endsection
