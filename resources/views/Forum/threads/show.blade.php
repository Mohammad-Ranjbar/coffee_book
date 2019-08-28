@extends('Forum.layouts.app')

@section('content')
	<div class="container">
		<div class="row" dir="rtl">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h3 style="float: right">
							<a href="{{ $thread->path() }}">{{ $thread->title }}</a>
						</h3>

						@can('update', $thread)
							<form action="{{ $thread->path() }}" method="post" style="float: left;">
								@csrf
								{{ method_field('DELETE') }}

								<button type="submit" class="btn btn-danger ">حذف نوشتار</button>
							</form>
						@endcan
					</div>

					<div class="card-body" align="right" dir="rtl">

						{{ $thread->body }}

					</div>
				</div>
				<br>

				@foreach($replies as $reply)

					<reply inline-template :attributes="{{$reply}}">

						<div class="card my-2" id="reply-{{$reply->id}}">
							<div class="card-header">
								<h5 style="display: flex; flex: 1; float: right">
									{{--<a href="{{ route('profile',['id'=>$reply->owner->id])}}">--}}
										{{ $reply->owner->name }}
									{{--</a>--}}
								</h5>
								<h5 style="display: flex; flex: 1; float: left">
									 {{ jdate($reply->created_at->diffForHumans())->ago()}}
								</h5>
								<favorite :reply="{{ $reply }}"></favorite>
							</div>

							<div class="card-body">
								<div v-if="editing">
									<div class="form-group">
										<textarea class="form-control" v-model="body">{{$reply->body}}</textarea>
									</div>

									<button class="btn btn-primary" @click="update">بروز رسانی</button>
									<button class="btn btn-warning" @click="editing=false">انصراف</button>

								</div>
								<div v-else v-text="body"></div>

							</div>

							@can('update', $reply)
								<div class="card-footer">
									<button class="btn btn-primary" style="float: right" @click="editing = true">ویرایش</button>
									<button type="submit" class="btn btn-danger" @click="destroy">حذف</button>
								</div>
							@endcan

						</div>
					</reply>

				@endforeach
				<br>
				{{ $replies->links() }}

				@if(auth()->check())
					<form action="{{ $thread->path() }}/addReply" method="POST">
						@csrf
						<div class="form-group" align="right" dir="rtl">
							<label for="body">بدنه: </label>
							<textarea name="body" id="body" class="form-control"></textarea>
						</div>

						<button type="submit" class="btn btn-primary" style="float: right">تایید</button>

					</form>
				@endif
			</div>

			<div class="col-md-4">
				<div class="card card-default">
					<div class="card-body" align="right" dir="rtl">
						<p>
							این نوشتار منتشر شده از {{ jdate($thread->created_at->diffForHumans())->ago() }} به وسیله <a
									href="#"> {{ $thread->owner->name }}</a>, و در حال حاضر {{ $thread->replies_count }} باز خورد
							داشته است.
						</p>


					</div>

				</div>

			</div>

		</div>
	</div>

@endsection
