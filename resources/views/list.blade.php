@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-md-7">
				<div class="popover-header" align="center" dir="rtl" style="background-color: #5a6268;color: aliceblue"> دسته
					بندی
				</div>
				<div class="list-group" align="center" dir="rtl" style="font-size: 20px;">
					@foreach($lists  as $list)
						<ul class="list-group-item">
							<li class="list-group-item "><a data-toggle="tooltip" data-placement="right"
							                                title="{{$list->description}}"
							                                href="{{route('list-book',['group' => $list->id])}}">{{$list->name}}</a>
							</li>
						</ul>
					@endforeach

				</div>
				{{--<button class="btn btn-primary col-md-12">اضافه کردن دسته</button>--}}
			</div>
			<div class="col-md-4">
				<div class="popover-header" align="center" dir="rtl" style="background-color: #5a6268;color: aliceblue">اضافه کردن دسته</div>
				<div  align="right" dir="rtl">
					<form action="{{route('post-list')}}" method="post" role="form">
						@csrf
						<div class="form-group">
							<label for="name">نام دسته</label>
							<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
						</div>
						<div class="form-group">
							<label for="description">توضیحات دسته</label>
							<input type="text" class="form-control" name="description" id="description"
							       value="{{old('description')}}">
						</div>
						<button type="submit" class="btn btn-primary col-md-12">تایید</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
		<div class="row justify-content-center">

		</div>
	</div>






@endsection
