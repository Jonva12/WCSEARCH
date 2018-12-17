<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/login.css">
</head>
<body id="page-top">

	@yield('content')

	<footer>
		@include('includes.login.footer')
	</footer>

	@include('includes.scripts')
</body>
</html>
