
<ul>
	<a href="{{ route('admin') }}">
		<li><i class="fas fa-home"></i><div>@lang('aside.home')</div></li>
	</a>
	<a href="{{ route('admin.usuarios') }}">
		<li><i class="fas fa-users"></i><div>@lang('aside.users')</div></li>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<li><i class="fas fa-map-marker-alt"></i><div> @lang('aside.wc')</div></li>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<li><i class="far fa-envelope"></i><div> @lang('aside.comments')</div></li>
	</a>
</ul>
