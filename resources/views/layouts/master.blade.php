<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	@include('includes.head')

	<title> Waste Water Leakage Tracker </title>

	@stack('after-styles')
</head>

<body>
	@include('includes.header')

	<div class="margin-top-1-rem">
		@yield('body')
	</div>

	<footer class="page-footer center-on-small-only text-color">
		<div class="container-fluid bg-dark padding-1-5-rem">
			@include('includes.footer')
		</div>

		@include('includes.foot')
		@stack('after-scripts')
	</footer>
</body>
</html>