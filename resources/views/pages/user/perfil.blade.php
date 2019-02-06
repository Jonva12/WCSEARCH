@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
  <style media="screen">

  @media(min-width: 600px){
    form{
      display: inline-flex;
      flex-direction: row;
      justify-content: space-around;
      align-items: baseline;
    }
  }
  table{
    width: inherit;
  }

  thead{
    table-layout: fixed;
  }
  tbody{
    overflow: scroll;
  }
  @media (max-width: 700px){

    .fa-chevron-right, .fa-chevron-left{
      margin-top: 10px;
    }
  }
  @media (min-width: 700px){
    .fa-chevron-right, .fa-chevron-left{
      visibility: hidden;
    }
  }
  </style>
    @if(Session::has('status'))
      <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }}"><div>{{ Session::get('status') }}</div><i id="x" class="fas fa-times" onclick="cerrar()"></i></div>
    @endif
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>{{$usuario->name}}</h1>
				<p><strong>Email:</strong> {{$usuario->email}}</p>
				<p><strong>Nivel:</strong> {{$usuario->role->nombre}}</p>
				<p><strong>Puntuacion:</strong> {{$usuario->puntuacion}}</p>
				@if($usuario->id==Auth::user()->id)
					<a href="{{route('usuario.ajustes')}}"><button class="btn btn-info">Ajustes</button></a>
				@endif
			</div>
			<div class="col-md-8">
				@if($usuario->id==Auth::user()->id)
					<h2>Tus aseos</h2>
				@else
					<h2>Sus aseos</h2>
				@endif
				<div>
				    <form action="{{route('usuario.perfil', $usuario->id)}}" method="get">
              <i class="fas fa-search"></i>
				    	<input type="text" name="nombre" class="form-control" placeholder="Nombre de aseo">
				    	<input type="text" name="direccion" class="form-control" placeholder="Direccion">
				    	<input type="submit" value="Filtrar" class="btn btn-success">
				    </form>
				</div>
        <div class="table-responsive">
          <a class="float-left"><i class="fas fa-chevron-left"></i></a>
          <a class="float-right"><i class="fas fa-chevron-right"></i></a>
          <table class="table table-hover">
						<thead>
							<tr>
								<th>Aseo</th>
								<th>Direccion</th>
								<th>Comentarios</th>
								<th>Reportes</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
								@if($aseos->count()==0)
								<tr>
									<td colspan="5">
										@if($usuario->id==Auth::user()->id && $usuario->role->nombre=="normal")
											Puedes tener 1 baño. Para crear baños ilimitados necesitas ser golden.
										@elseif($usuario->id==Auth::user()->id )
											Todavia no tienes ningun aseo.
										@else
											No tienes ningun aseo.
										@endif
									</td>
								</tr>
								@else
									@foreach($aseos as $a)
										<tr>
											<td>{{$a->nombre}}</td>
											<td>{{$a->dir}}</td>
											<td>{{$a->comentarios->count()}}</td>
											<td>{{$a->reportes->count()}}</td>
											<td>
												<a class="btn btn-primary" href="{{route('home',['latitud'=>$a->latitud, 'longitud'=>$a->longitud])}}">Ver <i class="fas fa-eye"></i></a>
												<a href="{{route('wc.edit', $a->id)}}" class="btn btn-secondary" id="editarLink">Editar <i class="fas fa-edit"></i></a>
												<a class="btn btn-danger" onclick="return confirm('¿Estas seguro?')" href="{{route('wc.ocultar', $a->id)}}">Eliminar <i class="fas fa-trash"></i></a>
											</td>
										</tr>
									@endforeach
								@endif
						</tbody>
					</table>

        </div>

			</div>
		</div>
</div>
	@endsection
