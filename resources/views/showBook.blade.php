@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6" align="center">
				<img src="{{$book->image}}">
				{{--{{$book}}--}}
				{{--{{$group}}--}}
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-9" align="center" dir="rtl">
				<li class="list-group-item">{{$book->name}}</li>
				<li class="list-group-item">{{$book->author}}</li>
				<li class="list-group-item">{{$book->description}}</li>
				<li class="list-group-item">{{$book->ISBN}}</li>



			</div>
		</div>
	</div>
@endsection
