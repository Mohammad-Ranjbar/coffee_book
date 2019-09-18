<div class="card">
    <div class="card-header">

        {{$profile_user->name}} نظر داد به
        <a href="{{ $activity->subject->thread->path() }}">"{{ $activity->subject->thread->title }}"</a>

    </div>

    <div class="card-body">

        {{ $activity->subject->body }}

    </div>
</div>
