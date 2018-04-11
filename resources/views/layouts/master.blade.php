<!DOCTYPE html>
<!--[if IE 8]><html lang="en" class="ie8 no-js"><![endif]-->
<!--[if IE 9]><html lang="en" class="ie9 no-js"><![endif]-->
<!--[if !IE]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
	@include('includes.head')

	<title> OD4D Cambodia | Waste Water Leakage Tracker </title>

	@stack('after-styles')
</head>

<body>
	@include('includes.header')
	{{-- Beta Message --}}
	<div class="alert alert-dismissible alert-info fade show" role="alert">
		<strong>Notice:</strong> This website is hosted in <span class="badge badge-danger">BETA Version</span> for testing. Thus, the data is testing data and some features might not work properly. We are looking forwards to your feedback.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	{{-- /Beta Message --}}

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