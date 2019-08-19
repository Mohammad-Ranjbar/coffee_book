@extends('layouts.app')

@section('content')


		<div class="row justify-content-center">
			<div class="col-md-10 " style="border: solid">
				<img src="/uploads/avatars/{{$user->avatar}}"
				     style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right: 25px;">
				<div class="float-right pt-3">
					<h2> نمایه شخصی {{$user->name}}</h2>
					<h2>عضویت از : {{$carbon}}</h2>
				</div>

			</div>
		</div>


	<div class="row justify-content-center">
		<div class="col-md-10 mt-3" style="border: solid">
			<div class="container" align="right" dir="rtl   ">
				<form enctype="multipart/form-data" action="/profile" method="post" role="form">
					@csrf
					<legend class="border-bottom mb-4">فرم ویرایش</legend>

					<div class="form-group" align="right" dir="rtl">
						<label for="name">تغیر نام کاربری</label>
						<input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
						<label for="avatar"> تغییر عکس</label>
						<input type="file" class="form-control-file" name="avatar" id="avatar">
						<button  type="submit" class="btn btn-primary mt-3" dir="rtl">تایید</button>

					</div>
				</form>
			</div>
		</div>
	</div>


@endsection
