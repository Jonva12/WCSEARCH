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
