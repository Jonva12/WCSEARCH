@extends('layout.user')

  @section('title', 'WCSearch')

  @section('content')
	<div class="container">
		<table>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Puntuacion</th>
				<th>Reportes</th>
			</tr>
			@if(isset($usuario))
			<tr>
				<th>{{$usuario->id}}</th>
				<th>{{$usuario->nombre}}</th>
				<th>{{$usuario->email}}</th>
				<th>{{$usuario->puntuacion}}</th>
				<th>{{$usuario->reportes}}</th>
			</tr>
			@endif
		</table>
	</div>
	@endsection