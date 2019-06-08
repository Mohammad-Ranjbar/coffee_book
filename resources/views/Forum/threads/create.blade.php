@extends('Forum.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align="right" dir="rtl"> ایجاد بحث جدید </div>

                    <div class="card-body" align="right" dir="rtl">
                        <div class="form-group">

                            <form action="/threads" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="channel_id">کانال را انتخاب کنید</label>
                                    <select name="channel_id" id="channel_id" class="form-control">
                                        @foreach($channels as $channel)

                                            <option value="{{ $channel->id }}" {{old('channel_id') == $channel->id ? 'selected' : ''}}>{{$channel->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">عنوان: </label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="body">توضیحات: </label>
                                    <textarea name="body" id="body" rows="8" class="form-control">{{ old('body') }}</textarea>
                                </div>
                                <button class="btn-primary btn" type="submit">ثبت بحت</button>
                            </form>

                            @if(count($errors))

                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
