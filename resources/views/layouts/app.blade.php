<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'کافه کتاب') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>


	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">



	{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-expand-lg bg-dark " >
		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">کافه کتاب</a>
		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Collapsible content -->
		<div class="collapse navbar-collapse" id="basicExampleNav" >
			<!-- Links -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">ثبت نام / ورود
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">دسته بندی کتب</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<!-- Dropdown -->
				<li class="nav-item dropdown multi-level-dropdown ">
					<a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle w-100">انجمن</a>
					<ul class="dropdown-menu mt-2 rounded-0 primary-color border-0 z-depth-1">
						<li class="dropdown-item dropdown-submenu p-0">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-white w-100">Click Me Too! </a>
							<ul class="dropdown-menu ml-2 rounded-0  border-0 z-depth-1">
								<li class="dropdown-item p-0">
									<a href="#" class="text-white w-100">Hey</a>
								</li>
								<li class="dropdown-item p-0">
									<a href="#" class="text-white w-100">Hi</a>
								</li>
								<li class="dropdown-item dropdown-submenu p-0">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle text-white w-100">Hello </a>
									<ul class="dropdown-menu mr-2 rounded-0 primary-color border-0 z-depth-1 r-100 ">
										<li class="dropdown-item p-0">
											<a href="#" class="text-white w-100">Some</a>
										</li>
										<li class="dropdown-item p-0">
											<a href="#" class="text-white w-100">Text</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown-item dropdown-submenu">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-white w-100">Click me </a>
							<ul class="dropdown-menu mr-2 rounded-0  primary-color border-0 z-depth-1 r-100 ">
								<li class="dropdown-item p-0">
									<a href="#" class="text-white w-100">How</a>
								</li>
								<li class="dropdown-item p-0">
									<a href="#" class="text-white w-100">are</a>
								</li>
								<li class="dropdown-item p-0">
									<a href="#" class="text-white w-100">you </a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<!-- Links -->
			<form class="form-inline">
				<div class="md-form my-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				</div>
			</form>
		</div>
		<!-- Collapsible content -->
	</nav>
	<!--/.Navbar-->
	<main class="py-4">
		@yield('content')
	</main>

	</div>
</body>
</html>
