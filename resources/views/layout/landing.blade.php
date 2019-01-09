<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
</head>
@if ($errors->any())
<body onload="window.location='#contact';" id="page-top">
@else
<body id="page-top">
@endif
	<header>
		@include('includes.landing.header')
	</header>

	@yield('content')

	<footer>
		@include('includes.landing.footer')
	</footer>

	@include('includes.scripts')
</body>
</html>
