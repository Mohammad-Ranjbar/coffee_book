@extends('layouts.app')

@section('content')
	<div class="row justify-content-center my-4">
		<div class="col-md-10 ">
			<img src="/uploads/avatars/{{$user->avatar}}"
			     style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right: 25px;">
			<div class="float-right pt-3" align="right" dir="rtl">
				<h2> نمایه شخصی {{$user->name}}</h2>
				<h2>عضویت از : {{$carbon}}</h2>
			</div>
		</div>
	</div>

	<div class="row justify-content-center ">
		<div class="col-md-5 mt-3">
			<div class="container" align="right" dir="rtl   ">
				<form enctype="multipart/form-data" action="/profile" method="post" role="form">
					@csrf
					<legend class="border-bottom mb-4">فرم ویرایش</legend>

					<div class="form-group" align="right" dir="rtl">
						<label for="name">تغیر نام کاربری</label>
						<input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
						<label for="avatar"> تغییر عکس</label>
						<input type="file" class="form-control-file" name="avatar" id="avatar">
						<button type="submit" class="btn btn-primary mt-3" dir="rtl">تایید</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container border-top py-2">
		<h1 align="center">کتاب های من</h1>
		<div class="row">

			@foreach($user->books as $book)
				<div class="col-md-4 ">
					<div class="card" align="center">
						<img class="card-img" src="{{$book->image}}"
						     style="width: 150px; height: 150px;  border-radius:50%; margin-right: 25px;">
						<div class="card-body py-2">
							<ul class="list-group py-2">
								<li class="list-group-item">{{$book->name}} </li>
								<li class="list-group-item">{{$book->description}}</li>
							</ul>
							<a href="#">
								<button class="col-md-12 btn btn-warning my-2">به روز رسانی کتاب</button>
							</a>
							<button class="col-md-12 btn btn-danger">حذف کتاب</button>

						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>



@endsection
