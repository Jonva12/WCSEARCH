@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
	<div class="container">
		<h1>@lang('editarUsuarioAdmin.editUser')</h1>
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form action="{{route('admin.guardarUsuario')}}" method="get">
            <input type="hidden" name="id" value="{{$usuario->id}}">
            <div>
                @lang('editarUsuarioAdmin.Name'): <input type="text" name="name" value="{{$usuario->name}}">
            </div>
            <div>
                @lang('editarUsuarioAdmin.Email'): <input type="Email" name="email" value="{{$usuario->email}}">
            </div>
            <div>
            	Rol:<select name="rol">
            		@switch($usuario->role_id)
    					@case(1)
        					<option selected value="1">@lang('editarUsuarioAdmin.rolNormal')</option>
        					<option value="2">@lang('editarUsuarioAdmin.rolPremium')</option>
        					<option value="3">@lang('editarUsuarioAdmin.rolAdmin')</option>
        				@break
						@case(2)
							<option value="1">@lang('editarUsuarioAdmin.rolNormal')</option>
        					<option selected value="2">@lang('editarUsuarioAdmin.rolPremium')</option>
        					<option value="3">@lang('editarUsuarioAdmin.rolAdmin')</option>
        				@break
        				@case(3)
        					<option value="1">@lang('editarUsuarioAdmin.rolNormal')</option>
							<option value="2">@lang('editarUsuarioAdmin.rolPremium')</option>
        					<option selected value="3">@lang('editarUsuarioAdmin.rolAdmin')</option>
        				@break
						@default
							<option value="1">@lang('editarUsuarioAdmin.rolNormal')</option>
							<option value="2">@lang('editarUsuarioAdmin.rolPremium')</option>
        					<option value="3">@lang('editarUsuarioAdmin.rolAdmin')</option>
						@endswitch
            		</select>
            </div>
            <div>
            	@lang('editarUsuarioAdmin.Score'): <input type="number" name="puntuacion" value="{{$usuario->puntuacion}}">
            </div>
            <div>
                <input type="submit" value="@lang('editarUsuarioAdmin.Change')">
            </div>  
        </form>
	</div>
@endsection