@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
	<h1>Aseo numero: {{$aseo->id}} ({{$aseo->nombre}})</h1>
	<a href="{{route('home',['latitud'=>$aseo->latitud, 'longitud'=>$aseo->longitud])}}" class="btn btn-info">Comprobar aseo</a> 
	@if($aseo->oculto==null)
	<a href="{{route('admin.aseo.ocultar',$aseo->id)}}" class="btn btn-danger">Ocultar</a>
	@else
	<a href="{{route('admin.aseo.mostrar',$aseo->id)}}" class="btn btn-danger">Mostrar</a>
	@endif

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