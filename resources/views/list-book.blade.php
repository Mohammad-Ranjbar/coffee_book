@extends('layouts.app')

@section('content')
	<div class="container">
		{{--		{{dd($group->name)}}--}}
		<div dir="rtl" align="center">
			<legend>کتب دسته ی {{$group->name}}</legend>
		</div>

		<div class="row justify-content-center">
			<div class="col-md-8 border"  style="font-size: 20px;">
				@forelse($lists as $list )
					<ul>

						<a href="{{route('show-book',['group'=>$group->id,'book'=>$list->id])}}">
							<li>{{$list->name}}</li>
						</a>
					</ul>
				@empty
					<p align="center">کتابی در این دسته موجود نیست</p>
				@endforelse
			</div>

			@if(auth()->check())
				<div class="col-md-4 border form-group " align="right" dir="rtl">
					<form action="{{route('add-book',['group' => $group->id])}}" enctype="multipart/form-data" method="post"
					      role="form">
						@csrf
						<legend class="popover-header text-center">اضافه کردن کتاب</legend>

						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="name">عنوان کتاب</label>
							<input type="text" class="form-control col-md-8" name="name" id="name">
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="author">نویسنده</label>
							<input type="text" class="form-control col-md-8" name="author" id="author">
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="publication">ناشر</label>
							<input type="text" class="form-control col-md-8" name="publication" id="publication">
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="ISBN">شابک</label>
							<input type="text" class="form-control col-md-8" name="ISBN" id="ISBN">
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="description">توضیحات</label>
							<input type="text" class="form-control col-md-8" name="description" id="description">
						</div>
						<div class="input-group float-right">
							<label class="col-md-2 ml-4" for="description">عکس</label>
							<div class="custom-file col-md-8" align="left">
								<input type="file" class="custom-file-input" name="image" id="image">
								<label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
							</div>
						</div>

						<button type="submit" class="btn btn-primary">تایید</button>
					</form>
				</div>
		</div>
	</div>
	@endif

@endsection
