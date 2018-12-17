<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body id="page-top">
	@include('includes.admin.header')

	<div class="row">
		<aside class="col-md-3 col-lg-2">
			@include('includes.admin.aside')
		</aside>
		<section class="col-md-9 col-lg-10">
			@yield('content')
		</section>
	</div>
	
		@include('includes.login.footer')
	
	@include('includes.scripts')

</body>
</html>