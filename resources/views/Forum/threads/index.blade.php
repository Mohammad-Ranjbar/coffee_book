@extends('Forum.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="right" dir="rtl"> نوشتار انجمن</div>

                    <div class="card-body">

                        @forelse($threads as $thread)

                            <article>
                                <div class="level" align="right" dir="rtl" style="display: flex; align-items: center;">

                                    <h4 style="flex: 1"> <a href="{{ route('profile', $thread->owner->name) }}">{{ $thread->owner->name }}</a> عنوان نوشتار :
                                        <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                                    </h4>

                                    @can('update', $thread)
                                        <form action="{{ $thread->path() }}" method="post" style="float: right;">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">حذف نوشتار</button>
                                        </form>
                                    @endcan

                                    <strong>{{ $thread->replies->count() }} نظرات</strong>
                                </div>
                                <div class="body" align="right" dir="rtl">{{ $thread->body }}</div>


                            </article>
                            <hr>

                        @empty
                            <p>هیچ نوشتاری یافت نشد</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
