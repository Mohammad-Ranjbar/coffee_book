@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="page-header" align="right" dir="rtl">
                    <h1>
                        {{ $profile_user->name }} ...
                        <small > از تاریخ : {{ $profile_user->created_at->diffForHumans() }}</small>
                    </h1>
                </div>

                @foreach($activities as $activity)

                    @if(view()->exists("profiles.Activities.{$activity->type}"))
                        @include("Profiles.Activities." .  $activity->type)
                    @endif
                @endforeach

                {{--{{ $threads->links() }}--}}
            </div>
        </div>
    </div>

@endsection
