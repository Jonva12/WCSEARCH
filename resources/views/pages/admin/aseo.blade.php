@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
	<h1>Aseo numero: {{$aseo->id}} ({{$aseo->nombre}})</h1>
	<a href="#" class="btn btn-info">Comprobar aseo</a> <a href="#" class="btn btn-danger">Borrar aseo</a> 
	<table>
		<tr>
			<th>Id</th>
			<th>Tipo</th>
			<th>Comentario</th>
			<th>Fecha</th>
		</tr>
		@foreach($aseo->reportes as $r)
		<tr>
			<td>{{$r->id}}</td>
			<td>{{$r->tipo}}</td>
			<td>{{$r->comentario}}</td>
			<td>{{$r->created_at}}</td>
		</tr>
		@endforeach
		@if($aseo->reportes->count()==0)
			<tr>
				<td colspan="6"> No hay reportes </td>
			</tr>
		@endif
	</table>
</div>
@endsection