@extends('layouts.app')

@section('content')

	<div align="right" dir="rtl" style="font-size: 20px;">
		@foreach($lists  as $list)
			<ul>
				<li>{{$list->name}}</li>
			</ul>
		@endforeach
	</div>


@endsection
