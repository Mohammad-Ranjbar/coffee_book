@extends('layouts.app')

@section('content')

		<div align="right" dir="rtl" style="font-size: 20px;">
			@foreach($lists  as $list)
				<ul>
					<li><a href="{{route('list-book',$list->id)}}">{{$list->name}}</a></li>
				</ul>
			@endforeach
		</div>
		<br><br><br>
		<div class="form-control"  align="right" dir="rtl" >
			<form action="{{route('post-list')}}" method="post" role="form">
				@csrf

				<div class="form-group">
					<label for="name">نام دسته</label>
					<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
				</div>
				<div class="form-group">
					<label for="description">توضیحات دسته</label>
					<input type="text" class="form-control" name="description" id="description" value="{{old('description')}}">
				</div>
				<button type="submit" class="btn btn-primary">تایید</button>
			</form>
		</div>







@endsection
