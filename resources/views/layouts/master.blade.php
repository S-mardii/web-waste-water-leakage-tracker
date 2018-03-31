<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	@include('includes.head')

	<title> Waste Water Leakage Tracker </title>

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />

	@stack('after-styles')
</head>

<body>
	@include('includes.header')

	<div class="margin-top-1-rem">
		@yield('body')
	</div>

	<footer class="page-footer center-on-small-only text-color">
		@include('includes.footer')

		@include('includes.foot')
		@stack('after-scripts')
	</footer>
</body>
</html>