@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">

		<div class="col-md-12">
			<div id="demo" class="carousel slide" data-ride="carousel">
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="/1.jpg"  width="100%" height="500">
						<div class="carousel-caption">
							<h3>پرونده ادبیات</h3>
							<p>اندیشه مرگ نجاتمان می دهد</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="/2.jpg"  width="100%" height="500">
						<div class="carousel-caption">
							<h3>زبان و ادبیات فارسی</h3>
							<p>نهمین همایش ملی زبان و ادبیات پارسی</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="/3.jpg"  width="100%" height="500">
						<div class="carousel-caption">
							<mark>
								<h3 class="bg-transparent">مجتبی مینوی</h3>
								<p>نگاهی به زندگی و آثار وی</p>
							</mark>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>

			</div>
		</div>
	</div>
	<div class="container " >
			<h1 class="header border-bottom border-dark mt-3" align="justify" dir="rtl">  جدید ترین کتاب های اضافه شده</h1>
		<div class="row" align="center">
			@foreach($newsbooks as $book)
				<div class="col-md-4 my-2"  >
					<div class="card" >
						<div class="card-header">
							{{$book->name}}
						</div>
						<div class="card-body" >
                        <a href="{{route('show-book',['group'=>$book->group->id,'book'=>$book->id])}}">
							<img src="{{$book->image}}"  style="height: 200px;width: 200px;border-radius: 50% ">
                        </a>

						</div>

						<div class="card-footer">
							{{jdate($book->created_at)->format('%A, %d %B %y')}}
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div >{{$newsbooks->links()}}</div>
	</div>

	<div class="container " >
		<h1 class="header border-bottom border-dark mt-3" align="justify" dir="rtl">  پرطرفدارترین کتاب ها</h1>
		<div class="row " align="center">
			@foreach($pops as $pop)
				<div class="col-md-4 my-2">
					<div class="content">
						<div class="card-header">
							{{$pop->name}}
						</div>

						<div class="card-body">
							<img src="{{$pop->image}}"  style="height: 200px;width: 200px;border-radius: 50% ">

						</div>

						<div class="card-footer">
							{{jdate($pop->created_at)->format('%A, %d %B %y')}}
							<p>تعداد ارا : {{$pop->likes()->count()}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>

	</div>

    <script>
		$(document).on('click', '.pagination a', function (e) {
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			getBooks(page);
		});

		function getBooks(page) {
			$.ajax({
				url:'/ajax/books/?page='+page
			}).done(function (data) {
				$('#app').html(data);
			})
			;

		}
    </script>


@endsection
