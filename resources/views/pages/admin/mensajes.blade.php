@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Fecha</th>
			<th>Mensaje</th>
			<th>Opciones</th>
		</tr>
		@foreach($mensajes as $m)
		<tr>
			<td>{{$m->id}}</td>
			<td>{{$m->name}}</td>
			<td>{{$m->email}}</td>
			<td>{{$m->created_at}}</td>
			<td>{{$m->message}}</td>
			<td>
				<a href="mailto:{{$m->email}}?Subject=Respuesta%20de%20WCSearch" class="btn btn-primary">Responder</a>
				<a href="{{route('admin.mensaje.eliminar',$m->id)}}" class="btn btn-danger">Eliminar</a>
			</td>
		</tr>
		@endforeach
		@if($mensajes->count()==0)
			<tr>
				<td colspan="6"> No hay mensajes </td>
			</tr>
		@endif
	</table>
</div>
@endsection