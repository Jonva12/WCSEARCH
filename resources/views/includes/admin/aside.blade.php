
<ul>
	<a href="{{ route('admin') }}">
		<li><i class="fas fa-home"></i> @lang('aside.home')</li>
	</a>
	<a href="{{ route('admin.usuarios') }}">
		<li><i class="fas fa-users"></i> @lang('aside.users')</li>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<li><i class="fas fa-map-marker-alt"></i> @lang('aside.wc')</li>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<li><i class="far fa-envelope"></i> @lang('aside.comments')</li>
	</a>
</ul>
