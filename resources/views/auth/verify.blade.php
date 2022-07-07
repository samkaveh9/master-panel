@extends('layouts.app')

@section('content')
    <main >
        <div class="form" style="margin-left: auto; margin-right: auto; margin-top: 10rem">
            <a class="account-logo" href="">
                <img src="{{ asset('asset/img/weblogo.png') }}" alt="">
            </a>

            <div class="form-content form-account">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        ایمیلی حاوی لینک تایید ایمیل برای شما ارسال شد.
                    </div>
                @endif
                        قبل از ادامه فعالیت ایمیلتان را تایید کنید و یا اگر برای ایمیلتان ارسال نشده درخواست مجدد بدهید.
                    <form action="{{ route('verification.resend') }}" class="d-inline" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="margin-right: 2.5rem">درخواست مجدد</button>
                    </form>
            </div>
        </div>
    </main>
@endsection
