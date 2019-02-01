@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
  <div>
    <form action="{{route('admin.aseos')}}" method="get">
      <i class="fas fa-search"></i>
      <input type="text" name="nombre" placeholder="Nombre de aseo">
      <input type="text" name="direccion" placeholder="Direccion">
      <input type="checkbox" id="ocultos" name="ocultos">
      <label for="ocultos">Mostrar ocultos</label>
      <input type="submit" value="Filtrar" class="btn btn-success">
    </form>
  </div>
  <div class="table-responsive">
    <table class="table">
  		<tr>
  			<th>Id</th>
  			<th>Nombre</th>
  			<th>Direccion</th>
  			<th>Autor</th>
  			<th>Reportes</th>
  			@if($ocultos==true)
  				<th>Fecha de ocultacion
  			@endif
  			<th>Opciones</th>
  		</tr>
  		@foreach($aseos as $a)
  			<tr>
  				<td>{{$a->id}}</td>
  				<td>{{$a->nombre}}</td>
  				<td>{{$a->dir}}</td>
  				<td>{{$a->usuario->name}}</td>
  				<td>{{$a->reportes->count()}}</td>
  				@if($ocultos==true)
  					<td>
  						{{$a->oculto}}
  					</td>
  					<td>
  						<a href="{{route('admin.aseo',$a->id)}}" class="btn btn-primary">Ver reportes</a>
  						<a href="{{route('admin.aseo.mostrar',$a->id)}}" class="btn btn-danger">Mostrar</a>
  						<a href="{{route('admin.aseo.eliminar',$a->id)}}" class="btn btn-danger">Eliminar</a>
  					</td>
  				@else
  					<td>
  						<a href="{{route('admin.aseo',$a->id)}}" class="btn btn-primary">Ver reportes</a>
  						<a href="{{route('admin.aseo.ocultar',$a->id)}}" class="btn btn-dark">Ocultar</a>
  						<a href="{{route('admin.aseo.eliminar',$a->id)}}" class="btn btn-danger">Eliminar</a>
  					</td>
  				@endif
  			</tr>
  		@endforeach
  		@if($aseos->count()==0)
  			<tr>
  				<td colspan="{{$ocultos?6:5}}"> No hay aseos </td>
  			</tr>
  		@endif
  	</table>
  </div>

</div>
@endsection
