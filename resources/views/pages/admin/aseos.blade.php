@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<div class="container">
  <div>
    <form action="{{route('admin.aseos')}}" method="get">
      <i class="fas fa-search"></i>
      <input type="text" name="nombre" placeholder="@lang('aseosAdmin.Name')">
      <input type="text" name="direccion" placeholder="@lang('aseosAdmin.Direction')">
      <input type="checkbox" id="ocultos" name="ocultos">
      <label for="ocultos">@lang('aseosAdmin.Hide')</label>
      <input type="submit" value="@lang('aseosAdmin.Filter')" class="btn btn-success">
    </form>
  </div>
  <div class="table-responsive">
    <table class="table">
  		<tr>
  			<th>Id</th>
  			<th>@lang('aseosAdmin.Name')</th>
  			<th>@lang('aseosAdmin.Direction')</th>
  			<th>@lang('aseosAdmin.Author')</th>
  			<th>@lang('aseosAdmin.Reports')</th>
  			@if($ocultos==true)
  				<th>@lang('aseosAdmin.Date')
  			@endif
  			<th>@lang('aseosAdmin.Options')</th>
  		</tr>
  		@foreach($aseos as $a)
  			<tr>
  				<td>{{$a->id}}</td>
  				<td>{!!$a->nombre!!}</td>
  				<td>{!!$a->dir!!}</td>
  				<td>{!!$a->usuario->name!!}</td>
  				<td>{{$a->reportes->count()}}</td>
  				@if($ocultos==true)
  					<td>
  						{{$a->oculto}}
  					</td>
  					<td>
  						<a href="{{route('admin.aseo',$a->id)}}" class="btn btn-primary">@lang('aseosAdmin.seeReports')</a>
  						<a href="{{route('admin.aseo.mostrar',$a->id)}}" class="btn btn-danger">@lang('aseosAdmin.Reveal')</a>
  						<a href="{{route('admin.aseo.eliminar',$a->id)}}" class="btn btn-danger">@lang('aseosAdmin.Delete')</a>
  					</td>
  				@else
  					<td>
  						<a href="{{route('admin.aseo',$a->id)}}" class="btn btn-primary">@lang('aseosAdmin.seeReports')</a>
  						<a href="{{route('admin.aseo.ocultar',$a->id)}}" class="btn btn-dark">@lang('aseosAdmin.Hide')</a>
  						<a href="{{route('admin.aseo.eliminar',$a->id)}}" class="btn btn-danger">@lang('aseosAdmin.Delete')</a>
  					</td>
  				@endif
  			</tr>
  		@endforeach
  		@if($aseos->count()==0)
  			<tr>
  				<td colspan="{{$ocultos?6:5}}"> @lang('aseosAdmin.noWC') </td>
  			</tr>
  		@endif
  	</table>
  </div>

</div>
@endsection
