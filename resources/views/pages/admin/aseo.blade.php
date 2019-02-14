@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
	<h1>@lang('aseoAdmin.wcNumber'): {{$aseo->id}} ({{$aseo->nombre}})</h1>
	<a href="{{route('home',['idAseo'=>$aseo->id])}}" class="btn btn-info">@lang('aseoAdmin.checkWC')</a>
	@if($aseo->oculto==null)
	<a href="{{route('admin.aseo.ocultar',$aseo->id)}}" class="btn btn-danger">@lang('aseoAdmin.hidden')</a>
	@else
	<a href="{{route('admin.aseo.mostrar',$aseo->id)}}" class="btn btn-danger">@lang('aseoAdmin.reveal')</a>
	@endif

	<table>
		<tr>
			<th>Id</th>
			<th>@lang('aseoAdmin.type')</th>
			<th>@lang('aseoAdmin.comment')</th>
			<th>@lang('aseoAdmin.date')</th>
		</tr>
		@foreach($aseo->reportes as $r)
		<tr>
			<td>{{$r->id}}</td>
			<td>{!!$r->tipo!!}</td>
			<td>{!!$r->comentario!!}</td>
			<td>{{$r->created_at}}</td>
		</tr>
		@endforeach
		@if($aseo->reportes->count()==0)
			<tr>
				<td colspan="6"> @lang('aseoAdmin.noReports') </td>
			</tr>
		@endif
	</table>
</div>
@endsection