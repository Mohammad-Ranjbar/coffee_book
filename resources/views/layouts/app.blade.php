<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	{{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}
	<link href="https://cdn.rawgit.com/rastikerdar/samim-font/v3.1.0/dist/font-face.css" rel="stylesheet" type="text/css"/>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="font-family: Samim">
	<div id="app">
		@include ('layouts.nav')
		<main >
			@yield('content')
		</main>
	</div>
	@include ('layouts.footer')
</body>
</html>
