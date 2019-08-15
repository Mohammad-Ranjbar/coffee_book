<!doctype html>
<html lang=fa>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<script src="{{ asset('js/app.js') }}" defer></script>
	<title>کافه بوک</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4" dir="rtl">
		<a class="navbar-brand" href="#">کافه کتاب</a>
		<a class="navbar-brand" href="{{route('list-group')}}"> دسته بندی </a>
		<a class="navbar-brand" href="{{route('Forum')}}"> انجمن </a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
		        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active d-flex">
					@if(!(auth()->check()))
						<a class="nav-link" href="{{route('login')}}">ورود <span class="sr-only">(current)</span></a>
					@endif

					<div>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>

			</ul>
		</div>
	</nav>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active" >
				<img src="/uploads/1.jpg" alt="Los Angeles" style="width:100%;height: 300px">
			</div>

			<div class="item">
				<img src="/uploads/1.jpg" alt="Chicago" style="width:100%;height: 300px">
			</div>

			<div class="item">
				<img src="/uploads/1.jpg" alt="New york" style="width:100%;height: 300px">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

</body>
</html>
