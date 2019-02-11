
<ul>
	<a href="{{ route('admin') }}">
		<li><i class="fas fa-home"></i><div>@lang('asideAdmin.home')</div></li>
	</a>
	<a href="{{ route('admin.usuarios') }}">
		<li><i class="fas fa-users"></i><div>@lang('asideAdmin.users')</div></li>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<li><i class="fas fa-map-marker-alt"></i><div> @lang('asideAdmin.wc')</div></li>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<li><i class="far fa-envelope"></i><div> @lang('asideAdmin.comments')</div></li>
	</a>
</ul>
