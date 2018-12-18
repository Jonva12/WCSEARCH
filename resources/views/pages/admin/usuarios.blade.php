@extends('layout.admin')

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
			<th>Opciones</th>
		</tr>
		@foreach($usuarios as $u)
		<tr>
			<td>{{$u->id}}</td>
			<td>{{$u->name}}</td>
			<td>{{$u->email}}</td>
			<td>{{$u->puntuacion}}</td>
			<td>{{$u->reportes}}</td>
			<td><a href="#" class="btn btn-danger">Bloquear</a></td>
		</tr>
		@endforeach
		@if($usuarios->count()==0)
			<tr>
				<td colspan="6"> No hay usuarios </td>
			</tr>
		@endif
	</table>
</div>
@endsection