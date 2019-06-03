@extends('layouts.app')

@section('content')



	<div align="right" dir="rtl" style="font-size: 20px;">


{{--{{dd($lists->toArray())}}--}}

		@if(!empty($lists))
		@foreach($lists  as $list)
			<ul>
				<li>{{$list->name}}</li>
			</ul>
		@endforeach
		@endif
	</div>


	<div class=" border" align="right" dir="rtl">
		<form action="{{route('add-book',['group' => $lists[0]->group_id])}}" method="post" role="form">
			@csrf
			<legend class="navbar-brand">اضافه کردن کتاب</legend>

			<div class="form-group d-flex">
				<label class="pl-4"  for="name">عنوان کتاب</label>
				<input type="text" class="form-control col-md-4" name="name" id="name" >
			</div>
			<div class="form-group d-flex">
				<label class="pl-5" for="author">نویسنده</label>
				<input type="text" class="form-control col-md-4" name="author" id="author" >
			</div>
			<div class="form-group d-flex">
				<label class="ml-5"  for="publication">ناشر</label>
				<input type="text" class="form-control col-md-4 mr-4" name="publication" id="publication" >
			</div>
			<div class="form-group d-flex">
				<label class="ml-4 pl-5"  for="ISBN">شابک</label>
				<input type="text" class="form-control col-md-4" name="ISBN" id="ISBN" >
			</div>
			<div class="form-group d-flex">
				<label class="pl-5"  for="description">توضیحات</label>
				<input type="text" class="form-control col-md-4" name="description" id="description" >
			</div>

			<button type="submit" class="btn btn-primary">تایید</button>
		</form>
	</div>

@endsection
