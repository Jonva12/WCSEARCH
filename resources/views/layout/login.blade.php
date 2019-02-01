<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
	<title>@yield('title')</title>
	<!-- Matomo -->
	<script type="text/javascript">
	  var _paq = window._paq || [];
	  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
	    var u="//matomo.locksek.com/piwik/";
	    _paq.push(['setTrackerUrl', u+'matomo.php']);
	    _paq.push(['setSiteId', '2']);
	    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
<!-- End Matomo Code -->
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
