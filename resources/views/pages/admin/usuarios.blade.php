@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
  <div>
    <form action="{{route('admin.usuarios')}}" method="get">
      <input type="text" name="nombre" placeholder="Nombre de usuario">
      <input type="text" name="email" placeholder="Email">
      Rol:
      <select name="rol">
        <option value="0">Todos</option>
        <option value="1">Normal</option>
        <option value="2">Golden</option>
        <option value="3">Admin</option>
      </select>
      <input type="checkbox" id="baneados" name="baneados">
      <label for="baneados">Mostrar baneados</label>
      <input type="submit" value="Filtrar">
    </form>
  </div>
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
			<td>{{$u->email}} <b>{{$u->email_verified_at==null?"(sin verificar)":""}}</b></td>
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
				@if($u->email_verified_at==null)
					<a href="{{route('admin.usuario.validar',$u->id)}}" class="btn btn-secondary">Validar</a>
				@endif
				<a href="{{route('admin.usuario.editar',$u->id)}}" class="btn btn-primary">Editar</a>
			</td>
		</tr>
		@endforeach
		@if($usuarios->count()==0)
			<tr>
				<td colspan="{{$baneados?8:7}}"> No hay usuarios </td>
			</tr>
		@endif
	</table>



</div>
@endsection
