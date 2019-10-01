@extends('layouts.app')
@section('content')
{{--    <nav aria-label="breadcrumb" dir="rtl" >--}}
        <ol class="breadcrumb" dir="rtl" style="font-size: 20px">
            <li class="breadcrumb-item"><a href="/"> خانه </a></li>
            <li class="breadcrumb-item"><a href="{{url('/listOfBook/'.$book->group->id)}}"> {{$book->group->name}} </a></li>
            <li class="breadcrumb-item active" aria-current="page">  {{$book->name}}  </li>
        </ol>
{{--    </nav>--}}
	@if (session('success'))

        <script>
	        Swal.fire({
		        position: 'center',
		        type: 'success',
		        title: 'نظر شما با موفقیت ثبت شد ',
		        showConfirmButton: false,
		        timer: 1500
	        })
        </script>
	@endif
	<div class="container">
		<div class="row justify-content-center mt-3">
			<div class="col-md-6" align="center">
				<img src="{{$book->image}}" style="border-radius: 50%;height: 200px;width: 200px;">

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
			<div class="col-md-8" dir="rtl" align="justify">

					@foreach($book->comments as $comment)
				<div class="card my-3">
					<div class="card-header">
						{{$comment->user->name}}
					</div>
						<div class="card-body">

								{{$comment->body}}

						</div>
				</div>
					@endforeach

			</div>

            @if (auth()->check())

			<div class="col-md-4" id="select" dir="rtl">
				<form action="{{route('cm-book',['book' => $book->id])}}" method="post" role="form" dir="rtl">
					@csrf
					<div class="form-group" dir="rtl">
						<label for="body"></label>
						<textarea type="text" class="form-control" name="body" id="body"  rows="8" placeholder="نظر خود را بنویسید ..." ></textarea>
					</div>

					<button type="submit" class="btn btn-primary">تایید</button>
				</form>
			</div>
            @endif

		</div>
	</div>


@endsection
