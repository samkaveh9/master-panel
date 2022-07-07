@extends('layouts.app')

@section('content')
    <main>
        <div class="account">
            <form action="{{ route('password.update') }}" class="form" method="post">
                @csrf
                <a class="account-logo" href="">
                    <img src="{{ asset('assets/img/weblogo.png') }}" alt="">
                </a>
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-content form-account">
                    <input name="email" id="email" type="text" class="txt-l txt @error('email') is-invalid @enderror"
                           value="{{ $email ?? old('email') }}" required placeholder="ایمیل">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input name="password" id="password" type="password"
                           class="txt-l txt @error('password') is-invalid @enderror" placeholder="رمز عبور">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input name="password_confirmation" id="password-confirm" type="password"
                           class="txt-l txt "
                           placeholder="رمز عبور">

                    <button class="btn btn--login" type="submit">تغییر رمز عبور</button>
                </div>
                <div class="form-footer">
                    <a href="{{ route('register') }}">صفحه ثبت نام</a>
                </div>
            </form>
        </div>
    </main>
@endsection
