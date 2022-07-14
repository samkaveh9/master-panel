@extends('dashboard::layouts.master')
@section('content')
    <div class="main-content  ">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{ route('user.store.info', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img">
{{--                        @if($)--}}
                            <img src="{{ $user->image != '' ? '/storage/'. $user->image : '/assets/panel/img/pro.jpg' }}" class="avatar___img">
{{--                        @else--}}
{{--                            <img src="{{ !is_null($user->image) ? '/storage/'. $user->image : '/assets/panel/img/pro.jpg' }}" class="avatar___img">--}}
{{--                        @endif--}}
                        <input type="file" name="image" accept="image/*" class="hidden avatar-img__input">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">کاربر : {{ $user->name }}</span>
                </div>
                <input class="text" name="name" placeholder="نام و نام خانوادگی" value="{{ $user->name }}">
                <input class="text" name="username" placeholder="نام کاربری" value="{{ $user->username }}">
                <input class="text" name="headline" id="headline" value="{{ $user->headline }}" placeholder="عنوان کاربری">
                <input class="text text-left" name="email" placeholder="ایمیل" value="{{ $user->email }}">
                <input class="text text-left" name="mobile" placeholder="شماره موبایل" value="{{ $user->mobile }}">
                <input class="text" name="website" id="website" value="{{ $user->website }}" placeholder="آدرس سایت خود را وارد کنید.(اختیاری)">
                <input class="text" name="linkedin" id="linkedin" value="{{ $user->linkedin }}" placeholder="آدرس لینکدین خود را وارد کنید.(اختیاری)">
                <input class="text" name="telegram" id="telegram" value="{{ $user->telegram }}" placeholder="آدرس تلگرام خود را وارد کنید.(اختیاری)">
                <input class="text" name="instagram" id="instagram" value="{{ $user->instagram }}" placeholder="آدرس اینستاگرام خود را وارد کنید.(اختیاری)">
                <input class="text" name="facebook" id="facebook" value="{{ $user->facebook }}" placeholder="آدرس فیسبوک خود را وارد کنید.(اختیاری)">
                <input class="text" name="twitter" id="twitter" value="{{ $user->twitter }}" placeholder="آدرس توییتر خود را وارد کنید.(اختیاری)">
                <input class="text" name="youtube" id="youtube" value="{{ $user->youtube }}" placeholder="آدرس یوتیوب خود را وارد کنید.(اختیاری)">
                <button class="btn btn-webamooz_net" type="submit">ذخیره تغییرات</button>
            </form>
        </div>

    </div>
@endsection
