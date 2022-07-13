@extends('user::layouts.app')

@section('content')
    <main>
        <div class="account">
            <form action="{{ route('login') }}" class="form" method="post">
                @csrf
                <a class="account-logo" href="">
                    <img src="{{ asset('assets/img/weblogo.png') }}" alt="">
                </a>
                <div class="form-content form-account">
                    <input name="email" id="email" type="text" class="txt-l txt @error('email') is-invalid @enderror" placeholder="ایمیل یا شماره موبایل">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input name="password" id="password" type="password" class="txt-l txt @error('password') is-invalid @enderror" placeholder="رمز عبور">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button class="btn btn--login" type="submit">ورود</button>
                    <label class="ui-checkbox">
                        مرا بخاطر داشته باش
                        <input type="checkbox" checked="checked" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                    <div class="recover-password">
                        <a href="{{ route('password.request') }}">بازیابی رمز عبور</a>
                    </div>
                </div>
                <div class="form-footer">
                    <a href="{{ route('register') }}">صفحه ثبت نام</a>
                </div>
            </form>
        </div>
    </main>
@endsection
