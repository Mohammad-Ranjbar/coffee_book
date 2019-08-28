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

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	<link href="https://cdn.rawgit.com/rastikerdar/samim-font/v3.1.0/dist/font-face.css" rel="stylesheet" type="text/css"/>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="font-family: Samim">
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #c9c1ff">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto  " dir="rtl">
						<!-- Authentication Links -->
						@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link border-left" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown border-left">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
								   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;">
									<img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;">
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="/profile/"{{auth()->user()->id}}>
										{{ __('نمایه شخصی') }}
									</a>
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										{{ __('خروج') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST"
									      style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('list-group') }}">{{ __('دسته بندی کتب') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('Forum') }}">{{ __('انجمن') }}</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>

		<main >
			@yield('content')
		</main>
	</div>
</body>
</html>
