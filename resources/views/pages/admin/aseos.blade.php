@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Reportes</th>
			<th>Opciones</th>
		</tr>
		@foreach($aseos as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->dir}}</td>
				<td>{{$a->reportes->count()}}</td>
				<td>
					<a href="#" class="btn btn-primary">Ver info</a>
					<a href="#" class="btn btn-danger">Eliminar</a>
				</td>
			</tr>
		@endforeach
		@if($aseos->count()==0)
			<tr>
				<td colspan="5"> No hay aseos </td>
			</tr>
		@endif
	</table>
</div>
@endsection