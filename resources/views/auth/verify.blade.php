@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تایید آدرس ایمیل') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('لینک تایید به ادرس ایمیل شما ارسال شد') }}
                        </div>
                    @endif

                    {{ __('لطفا ایمیل خود را تایید کنید') }}
                    {{ __('اگر ایمیل را دریافت نکرده اید') }}, <a href="{{ route('verification.resend') }}">{{ __('برای ارسال دوباره کلیک کنید') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
