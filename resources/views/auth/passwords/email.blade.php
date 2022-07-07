@extends('layouts.app')

@section('content')
    <main>
        <div class="account">
            <form action="{{ route('password.email') }}" class="form" method="post">
                @csrf
                <a class="account-logo" href="">
                    <img src="{{ asset('asset/img/weblogo.png') }}" alt="">
                </a>
                <div class="form-content form-account">
                    <input id="email" type="email" class="txt-l txt @error('email') is-invalid @enderror" name="email" placeholder="ایمیل" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <button class="btn btn-recoverpass" type="submit">بازیابی</button>
                </div>
                <div class="form-footer">
                    <a href="{{ route('login') }}">صفحه ورود</a>
                </div>
            </form>
        </div>
    </main>
@endsection
