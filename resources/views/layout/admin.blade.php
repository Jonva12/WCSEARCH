<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/user.css">
	<link rel="stylesheet" type="text/css" href="/css/admin.css">
</head>
<body id="page-top">
	@include('includes.app.navbar')

	<div class="row">
		<aside class="col-md-3">
			@include('includes.admin.aside')
		</aside>
		<section class="col-md-9">
			@yield('content')
		</section>
	</div>
	@include('includes.scripts')
</body>
</html>
