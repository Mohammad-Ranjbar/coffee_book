@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row justify-content-center mt-3">
			<div class="col-md-6" align="center">
				<img src="{{$book->image}}" style="border-radius: 50%;height: 200px;width: 200px;">
				{{--{{$book}}--}}
				{{--{{$group}}--}}
			</div>
		</div>
		<div class="row justify-content-center border-bottom border-dark my-3">
			<div class="col-md-6 mb-3" align="center" dir="rtl">
				<li class="list-group-item">{{$book->name}}</li>
				<li class="list-group-item">{{$book->author}}</li>
				<li class="list-group-item">{{$book->description}}</li>
				<li class="list-group-item">{{$book->ISBN}}</li>
			</div>
		</div>
		<h1 align="center"> نظرات</h1>
		<div class="row justify-content-center">

			<div class="vol-md-6" id="select">
				{{--<form action="" method="" role="form" dir="rtl">--}}

				<div class="form-group">
					<label for=""></label>
					<input type="text" class="form-control" name="cm" id="tags" onchange="select()" placeholder="Input...">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
				{{--</form>--}}
			</div>
		</div>
	</div>

	<script>

	</script>

@endsection
