@extends('layouts.app')

@section('content')
    <main>

        <div class="account">
            <form action="{{ route('register') }}" class="form" method="post">
                @csrf
                <a class="account-logo" href="">
                    <img src="{{ asset('assets/img/weblogo.png') }}" alt="">
                </a>
                <div class="form-content form-account">
                    <input id="name" name="name" type="text" class="txt @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" placeholder="نام و نام خانوادگی">

                    @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="email" name="email" type="email" class="txt txt-l @error('email') is-invalid @enderror mt-2"
                           value="{{ old('email') }}" placeholder="ایمیل">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="mobile" name="mobile" type="text" class="txt txt-l @error('mobile') is-invalid @enderror"
                           value="{{ old('mobile') }}" placeholder="شماره موبایل">
                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password" name="password" type="password"
                           class="txt txt-l @error('password') is-invalid @enderror"
                           placeholder="رمز عبور">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="password-confirm" name="password_confirmation" type="password"
                           class="txt txt-l"
                           placeholder="رمز عبور">

                    <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
                    <br>
                    <button class="btn continue-btn" type="submit">ثبت نام و ادامه</button>

                </div>
                <div class="form-footer">
                    <a href="{{ route('login') }}">صفحه ورود</a>
                </div>
            </form>
        </div>
    </main>
@endsection
