@extends('layouts.app')

@section('content')
	<div class="container py-4">
		<div class="row align-content-center border-bottom border-dark ">
			<div class="col-md-4">
				<button class="btn btn-warning" disabled> اضافه کردن کتاب</button>
			</div>

			<div class="col-md-4 mb-2">
				<legend>کتب دسته ی {{$group->name}}</legend>
			</div>
			@if (auth()->check())
				<div class="col-md-4 float-right" align="right">
					<button class="btn btn-success"  data-toggle="modal" data-target="#myModal"> اضافه کردن کتاب</button>
				</div>
			@endif
		</div>

	</div>

	<div class="row justify-content-center mt-4">
		@foreach($lists as $list )

			<div class="card mx-2">
				<a href="{{route('show-book',['group'=>$group->id,'book'=>$list->id])}}">
					<div class="card-header ">
						<img src="{{$list->image}}" style="height: 200px;width: 200px;border-radius: 50% ">
					</div>
				</a>
				<div class="card-body">
					<li class="list-group-item">{{$list->name}}</li>
				</div>
			</div>


		@endforeach
	</div>





	</div>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">




				<div class="modal-body" align="right" dir="rtl">
					<form action="{{route('add-book',['group' => $group->id,'user'=>auth()->user()->id])}}"
					      enctype="multipart/form-data" method="post"
					      role="form">
						@csrf
						<legend class="popover-header text-center">اضافه کردن کتاب</legend>

						<div class="form-group d-flex ">
							<label class="col-md-2 ml-4" for="name">عنوان </label>
							<input class="input-group-text" type="text" class="form-control col-md-8" name="name" id="name" required>
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="author">نویسنده</label>
							<input class="input-group-text" type="text" class="form-control col-md-8" name="author" id="author" required>
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="publication">ناشر</label>
							<input class="input-group-text" type="text" class="form-control col-md-8" name="publication" id="publication" required>
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="ISBN">شابک</label>
							<input class="input-group-text" type="text" class="form-control col-md-8" name="ISBN" id="ISBN" required>
						</div>
						<div class="form-group d-flex">
							<label class="col-md-2 ml-4" for="description" style="font-size: 13px;">توضیحات</label>
							<input class="input-group-text" type="text" class="form-control col-md-8" name="description"  id="description" required>
						</div>
						<div class="input-group float-right">
							<label class="col-md-2 ml-4" for="description">عکس</label>
							<div class="custom-file col-md-8 mb-2" align="left">
								<input type="file" class="custom-file-input" name="image" id="image">
								<label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
							</div>
						</div>

						<button type="submit" class="btn btn-primary">تایید</button>
						<button type="button" class=" float-left btn btn-danger" data-dismiss="modal">انصراف</button>
					</form>

				</div>

			</div>
		</div>
	</div>
	<script>
		@if (session('alert'))
		swal("{{ session('alert') }}");
		@endif
	</script>
@endsection
