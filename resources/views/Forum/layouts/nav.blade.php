
	{{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #c9c1ff">--}}

	<nav class="mb-1 navbar navbar-expand-lg navbar-dark secondary-color lighten-1 bg-dark " style="font-size: 22px">

        <a class="navbar-brand" href="{{ url('/') }}">
            {{'کافه بوک' }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        جستجو
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/threads">تمام نوشتار ها</a>
                        @if(auth()->check())
                            <a class="dropdown-item" href="/threads?by={{ auth()->user()->name }}">نوشتار های من</a>
                        @endif
                        <a class="dropdown-item" href="/threads?popular=1">نوشتار های مطرح</a>
                        <a class="dropdown-item" href="/threads?unanswered=1">نوشتار های بدون جواب</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/threads/create">نوشتار جدید</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        موضوعات
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @foreach(App\models\Channel::all() as $channel)
                            <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
                        @endforeach


                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" >
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                    </li>
                @else
                    <user-notifications user="{{ Auth::user()->name }}"></user-notifications>
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a id="navbarDropdown" class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >--}}
                            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();" >--}}
                                {{--{{ __('خروج') }}--}}
                            {{--</a>--}}

                            {{--<a href="{{ route('profile') }}" class="dropdown-item">صفحه ی من</a>--}}
                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</li>--}}
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
            </ul>
        </div>

</nav>

