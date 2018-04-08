<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	@include('includes.head')

	<title> OD4D Cambodia </title>

	@stack('after-styles')
</head>

<body>
	@include('includes.header')

	<div class="margin-top-1-rem">
		@yield('body')
	</div>

	<footer class="page-footer center-on-small-only text-color">
		<div class="container-fluid bg-dark padding-1-rem">
			@include('includes.footer')
		</div>

		@include('includes.foot')
		@stack('after-scripts')
	</footer>
</body>
</html>