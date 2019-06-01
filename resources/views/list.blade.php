@extends('layouts.app')

@section('content')
	<div class="form-group" align="right" dir="rtl" style="font-size: 20px;">
		@foreach($lists  as $list)
			<ul>
				<li><a href="{{route('list-book')}}">{{$list->name}}</a></li>
			</ul>
		@endforeach
	</div>

@endsection
