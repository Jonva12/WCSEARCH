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
			@if($baneados==true)
				<th>Fecha de baneo</th>
			@endif
			<th>Opciones</th>
		</tr>
		@foreach($usuarios as $u)
		<tr>
			<td>{{$u->id}}</td>
			<td>{{$u->name}}</td>
			<td>{{$u->email}}</td>
			<td>{{$u->puntuacion}}</td>
			<td>{{$u->reportes}}</td>
			@if($baneados==true)
			<td>
				{{$u->fecha_de_baneo}}
			</td>
			<td>
				<a href="{{route('admin.usuario.desbanear',$u->id)}}" class="btn btn-danger">Desbanear</a>
			</td>
			@else
			<td>
				<a href="{{route('admin.usuario.banear',$u->id)}}" class="btn btn-danger">Banear</a>
			</td>
			@endif
		</tr>
		@endforeach
		@if($usuarios->count()==0)
			<tr>
				<td colspan="{{$ocultos?7:6}}"> No hay usuarios </td>
			</tr>
		@endif
	</table>
	@if($baneados==true)
		<a href="{{route('admin.usuarios')}}" class="btn btn-danger">Listar usuarios</a>
	@else
		<a href="{{route('admin.usuarios',true)}}" class="btn btn-danger">Listar baneados</a>
	@endif

	
</div>
@endsection