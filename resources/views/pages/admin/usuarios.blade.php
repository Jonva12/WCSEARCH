@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
  <div>
    <form action="{{route('admin.usuarios')}}" method="get">
      <i class="fas fa-search"></i>
      <input type="text" name="nombre" placeholder="@lang('usuariosAdmin.Name')">
      <input type="text" name="email" placeholder="@lang('usuariosAdmin.Email')">
      Rol:
      <select name="rol">
        <option value="0">@lang('usuariosAdmin.rolAll')</option>
        <option value="1">@lang('usuariosAdmin.rolNormal')</option>
        <option value="2">@lang('usuariosAdmin.rolPremium')</option>
        <option value="3">@lang('usuariosAdmin.rolAdmin')</option>
      </select>
      <input type="checkbox" id="baneados" name="baneados">
      <label for="baneados">@lang('usuariosAdmin.seeBanned')</label>
      <input type="submit" value="@lang('usuariosAdmin.Filter')" class="btn btn-success">
    </form>
  </div>
  <div class="table-responsive">
    <table class="table">
  		<tr>
  			<th>Id</th>
  			<th>@lang('usuariosAdmin.Name')</th>
  			<th>@lang('usuariosAdmin.Email')</th>
  			<th>Rol</th>
  			<th>@lang('usuariosAdmin.Puntuation')</th>
  			<th>@lang('usuariosAdmin.Reports')</th>
  			@if($baneados==true)
  				<th>@lang('usuariosAdmin.BanDate')</th>
  			@endif
  			<th>@lang('usuariosAdmin.Options')</th>
  		</tr>
  		@foreach($usuarios as $u)
  		<tr>
  			<td>{{$u->id}}</td>
  			<td>{{$u->name}}</td>
  			<td>{{$u->email}} <b>{{$u->email_verified_at==null?"(sin verificar)":""}}</b></td>
  			<td>{{$u->role->nombre}}</td>
  			<td>{{$u->puntuacion}}</td>
  			<td>{{$u->reportes}}</td>
  			<td>
  			@if($baneados==true)
  				{{$u->fecha_de_baneo}}
  			</td>
  			<td>

  				<a href="{{route('admin.usuario.desbanear',$u->id)}}" class="btn btn-danger">@lang('usuariosAdmin.quitBan')</a>
  			@else
  				<a href="{{route('admin.usuario.banear',$u->id)}}" class="btn btn-danger">@lang('usuariosAdmin.Ban')</a>

  			@endif
  				@if($u->email_verified_at==null)
  					<a href="{{route('admin.usuario.validar',$u->id)}}" class="btn btn-secondary">@lang('usuariosAdmin.Validate')</a>
  				@endif
  				<a href="{{route('admin.usuario.editar',$u->id)}}" class="btn btn-primary">@lang('usuariosAdmin.Edit')</a>
  			</td>
  		</tr>
  		@endforeach
  		@if($usuarios->count()==0)
  			<tr>
  				<td colspan="{{$baneados?8:7}}"> @lang('usuariosAdmin.woValidation') </td>
  			</tr>
  		@endif
  	</table>
  </div>
</div>
@endsection
