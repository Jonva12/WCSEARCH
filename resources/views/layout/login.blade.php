<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/login.css">
	<link rel="stylesheet" href="/css/alerts.css">
</head>
<body id="page-top">

	@yield('content')

	@include('includes.scripts')
	<script type="text/javascript">

	document.getElementById("x").addEventListener('click', cerrar);
		//para todas las alertas
		function cerrar(){
			document.getElementById("alert").remove();
		}
	</script>
</body>
</html>
