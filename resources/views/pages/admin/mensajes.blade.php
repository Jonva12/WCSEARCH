@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
  <h1>Lista de Mensajes</h1>
  <div>
    <form action="{{route('admin.mensajes')}}" method="get">
      <i class="fas fa-search"></i>
      <input type="text" name="nombre" placeholder="@lang('mensajesAdmin.Name')">
      <input type="text" name="email" placeholder="@lang('mensajesAdmin.Email')">
      <input type="submit" value="@lang('mensajesAdmin.filter')" class="btn btn-success">
    </form>
  </div>
  <div class="table-responsive">
    <table class="table">
  		<tr>
  			<th>Id</th>
  			<th>@lang('mensajesAdmin.Name')</th>
  			<th>@lang('mensajesAdmin.Email')</th>
  			<th>@lang('mensajesAdmin.Date')</th>
  			<th>@lang('mensajesAdmin.Message')</th>
  			<th>@lang('mensajesAdmin.Options')</th>
  		</tr>
  		@foreach($mensajes as $m)
  		<tr>
  			<td>{{$m->id}}</td>
  			<td>{!!$m->name!!}</td>
  			<td>{!!$m->email!!}</td>
  			<td>{{$m->created_at}}</td>
  			<td>{!!$m->message!!}</td>
  			<td>
  				<a href="mailto:{{$m->email}}?Subject=Respuesta%20de%20WCSearch" class="btn btn-primary">@lang('mensajesAdmin.Response')</a>
  				<a href="{{route('admin.mensaje.eliminar',$m->id)}}" class="btn btn-danger">@lang('mensajesAdmin.Delete')</a>
  			</td>
  		</tr>
  		@endforeach
  		@if($mensajes->count()==0)
  			<tr>
  				<td colspan="6"> @lang('mensajesAdmin.noMessage') </td>
  			</tr>
  		@endif
  	</table>
  </div>
</div>
@endsection
