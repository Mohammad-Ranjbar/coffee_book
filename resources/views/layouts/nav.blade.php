<!--Navbar -->

<nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1 bg-dark " style="font-size: 22px">
	<a class="navbar-brand" href="/">کافه کتاب</a>

	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">خانه
				</a>

			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('list-group') }}">دسته بندی کتب</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('Forum') }}">انجمن ادبی</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">اطلاعیه ها
				</a>
				<div class="dropdown-menu dropdown-secondary">
					<a class="dropdown-item" href="#">اخبار روز</a>
					<a class="dropdown-item" href="#">همایش ها</a>
					{{--<a class="dropdown-item" href="#">Something else here</a>--}}
				</div>
			</li>
		</ul>
	@guest
		<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto  " dir="rtl">
				<!-- Authentication Links -->
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
				</li>
				@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link " href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
					</li>
				@endif
			</ul>
		@else
			<ul class="navbar-nav ml-auto nav-flex-icons">

				<li class="nav-item avatar dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown"
					   aria-haspopup="true" aria-expanded="false">
						<img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width: 70px; height: 70px"
						     class="rounded-circle z-depth-0"
						     alt="avatar image">
					</a>
					<div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary">
						<a class="dropdown-item" href="{{route('profile')}}">پروفایل من</a>

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
			</ul>
		@endguest
	</div>
</nav>
<!--/.Navbar -->
