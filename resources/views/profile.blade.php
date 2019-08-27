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
				<div class="col-md-4 my-2">
					<div class="card" align="center">
						<img class="card-img" src="{{$book->image}}"
						     style="width: 150px; height: 150px;  border-radius:50%; margin-right: 25px;">
						<div class="card-body ">
							<ul class="list-group py-2">
								<li class="list-group-item">{{$book->name}} </li>
								<li class="list-group-item">{{$book->description}}</li>
							</ul>
								<button class="col-md-12 btn btn-warning my-2" data-toggle="modal" data-target="#myModal-{{ $book->id }}">به روز
									رسانی کتاب
								</button>
							<button class="col-md-12 btn btn-danger" data-toggle="modal" data-target="#myModal-delete-{{ $book->id }}">حذف کتاب</button>

							<!-- Modal -->

						</div>
					</div>
				</div>

				<div id="myModal-{{ $book->id }}" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content for update-->
						<div class="modal-content">
							<div class="modal-header" dir="rtl" align="center">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<legend>به روز رسانی کتاب {{$book->name}}</legend>
							</div>
							<div class="modal-body" dir="rtl" align="right">

								{{--update Book--}}
								<form action="{{route('update-Book',['id' => $book->id])}}" method="post" role="form">
									@csrf
										{{method_field('PUT')}}
									<div class="form-group">
										<label for="name">نام کتاب</label>
										<input type="text" class="form-control" name="name" id="name" value="{{$book->name}}">
									</div>
									<div class="form-group">
										<label for="author">نویسنده کتاب</label>
										<input type="text" class="form-control" name="author" id="author" value="{{$book->author}}">
									</div>
									<div class="form-group">
										<label for="publication">انتشارات</label>
										<input type="text" class="form-control" name="publication" id="publication" value="{{$book->publication}}">
									</div>
									<div class="form-group">
										<label for="ISBN">شابک</label>
										<input type="text" class="form-control" name="ISBN" id="ISBN" value="{{$book->ISBN}}">
									</div>
									<div class="form-group">
										<label for="description">توضیحات</label>
										<input type="text" class="form-control" name="description" id="description" value="{{$book->description}}">
									</div>

									<button type="submit" class="btn btn-primary">تایید</button>
								</form>

							</div>

						</div>

					</div>
				</div>
				<!-- Modal for delete -->
				<div class="modal fade" id="myModal-delete-{{ $book->id }}" role="dialog">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header" align="center" dir="rtl">
								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>
							<div class="modal-body" align="right" dir="rtl">
								<p>آیا از حذف کتاب " {{$book->name}} "  اطمینان دارید ؟</p>

								<form id="delete-form" action="{{ route('delete-book',['id' => $book->id]) }}" method="POST">
									@csrf
									{{method_field('DELETE')}}
									<button type="submit" class="btn btn-danger">حذف</button>
								</form>
							</div>

						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>



@endsection
