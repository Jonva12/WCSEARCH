@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
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
			<td>{{$u->role->nombre}}</td>
			<td>{{$u->puntuacion}}</td>
			<td>{{$u->reportes}}</td>
			<td>
			@if($baneados==true)
			
				{{$u->fecha_de_baneo}}
			</td>
			<td>
				<a href="{{route('admin.usuario.desbanear',$u->id)}}" class="btn btn-danger">Desbanear</a>
			@else
				<a href="{{route('admin.usuario.banear',$u->id)}}" class="btn btn-danger">Banear</a>
			
			@endif
				<a href="{{route('admin.usuario.editar',$u->id)}}" class="btn btn-primary">Editar</a>
			</td>
		</tr>
		@endforeach
		@if($usuarios->count()==0)
			<tr>
				<td colspan="{{$baneados?7:6}}"> No hay usuarios </td>
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