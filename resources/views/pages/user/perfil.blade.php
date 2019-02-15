@extends('layout.app')

  @section('title', 'WCSearch')

  @section('content')
  <link rel="stylesheet" href="/css/perfil.css">
    @if(Session::has('status'))
      <div id="alert" class="alert {{ Session::get('alert-class', 'alert-warning') }}"><div>{{ Session::get('status') }}</div><i id="x" class="fas fa-times" onclick="cerrar()"></i></div>
    @endif
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>{!!$usuario->name!!}</h1>
				<p><strong>@lang('userPerfil.Email'):</strong> {{$usuario->email}}</p>
				<p><strong>@lang('userPerfil.Level'):</strong> {{$usuario->role->nombre}}</p>
				<p><strong>@lang('userPerfil.Score'):</strong> {{$usuario->puntuacion}}</p>
				@if(Auth::user() && $usuario->id==Auth::user()->id)
					<a href="{{route('usuario.ajustes')}}"><button class="btn btn-info">@lang('userPerfil.Settings')</button></a>
				@else
					<a href="{{route('usuario.reportar', $usuario->id)}}" onclick="return confirm(@lang('userPerfil.Sure'))"><button class="btn btn-danger">@lang('userPerfil.Report')</button></a>
				@endif
			</div>
			<div class="col-md-8">
				@if(Auth::user() && $usuario->id==Auth::user()->id)
					<h2>@lang('userPerfil.meWC')</h2>
				@else
					<h2>@lang('userPerfil.otherWC')</h2>
				@endif
				<div>
				    <form action="{{route('usuario.perfil', $usuario->id)}}" method="get">
              <i class="fas fa-search"></i>
				    	<input type="text" name="nombre" class="form-control" placeholder="@lang('userPerfil.WCName')">
				    	<input type="text" name="direccion" class="form-control" placeholder="@lang('userPerfil.Direction')">
				    	<input type="submit" value="@lang('userPerfil.Filter')" class="btn btn-success">
				    </form>
				</div>
        <div class="table-responsive">
          <a class="float-left"><i class="fas fa-chevron-left"></i></a>
          <a class="float-right"><i class="fas fa-chevron-right"></i></a>
          <table class="table table-hover">
						<thead>
							<tr>
								<th>@lang('userPerfil.WC')</th>
								<th>@lang('userPerfil.Direction')</th>
								<th>@lang('userPerfil.Comments')</th>
								<th>@lang('userPerfil.Reports')</th>
								<th>@lang('userPerfil.Options')</th>
							</tr>
						</thead>
						<tbody>
								@if($aseos->count()==0)
								<tr>
									<td colspan="5">
										@if($usuario->id==Auth::user()->id && $usuario->role->nombre=="normal")
											@lang('userPerfil.comment1')
										@elseif($usuario->id==Auth::user()->id )
											@lang('userPerfil.comment2')
										@else
											@lang('userPerfil.comment3')
										@endif
									</td>
								</tr>
								@else
									@foreach($aseos as $a)
										<tr>
											<td>{!!$a->nombre!!}</td>
											<td>{!!$a->dir!!}</td>
											<td>{{$a->comentarios->count()}}</td>
											<td>{{$a->reportes->count()}}</td>
											<td>
												<a class="btn btn-primary" href="{{route('home',['idAseo'=>$a->id])}}">@lang('userPerfil.See') <i class="fas fa-eye"></i></a>
												@if(Auth::user() && $usuario->id==Auth::user()->id)
												<a href="{{route('wc.edit', $a->id)}}" class="btn btn-secondary">@lang('userPerfil.Edit') <i class="fas fa-edit"></i></a>
												<a class="btn btn-danger" onclick="return confirm('¿Estas seguro?')" href="{{route('wc.ocultar', $a->id)}}">@lang('userPerfil.Delete') <i class="fas fa-trash"></i></a>
												@endif
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
