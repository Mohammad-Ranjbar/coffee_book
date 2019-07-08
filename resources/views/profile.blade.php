@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<img src="/uploads/avatars/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right: 25px;">
				<h2>{{$user->name}}'s Profile</h2>
				{{--<form enctype="multipart/form-data" action="/profile" method="post">--}}
					{{--<label> Update Profile Image</label>--}}
					{{--<input type="file" name="avatar">--}}
					{{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
					{{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
				{{--</form>--}}


			</div>
		</div>
	</div>
	<div class="container border w-50" align="right" dir="rtl   ">
		<form enctype="multipart/form-data" action="/profile" method="post" role="form">
			@csrf
			<legend >فرم ویرایش</legend>

			<div class="form-group" align="right" dir="rtl">
				<label for="name">تغیر نام کاربری</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="نام کاربری ...">
				<label for="avatar">  تغییر عکس</label>
				<input type="file" class="custom-file" name="avatar" id="avatar" >
				<button type="submit" class="btn btn-primary mt-3" dir="rtl">تایید</button>

			</div>
		</form>
	</div>


@endsection
