<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
</head>
<body id="page-top">
	@include('includes.admin.header')

	@yield('content')

	<footer>
		include('includes.admin.footer')
	</footer>
	
	@include('includes.scripts')

</body>
</html>