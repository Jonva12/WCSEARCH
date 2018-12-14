<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
</head>
<body id="page-top">
	<header>
		@include('includes.header')
	</header>

	@yield('content')

	<footer>
		@include('includes.footer')
	</footer>

	@include('includes.scripts')
</body>
</html>