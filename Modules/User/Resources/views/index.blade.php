@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('users.index') }}">همه کاربران</a>
{{--                <a class="tab__item" href="">مدیران</a>--}}
{{--                <a class="tab__item" href="">مدرسین</a>--}}
{{--                <a class="tab__item" href="">نویسنده</a>--}}
{{--                <a class="tab__item" href="">کاربران تاییده نشده</a>--}}
{{--                <a class="tab__item" href="">کاربران تایید شده</a>--}}
{{--                <a class="tab__item" href="create-user.html">ایجاد کاربر جدید</a>--}}
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
{{--                    <div class="t-header-searchbox font-size-13">--}}
{{--                        <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی کاربر">--}}
{{--                        <div class="t-header-search-content ">--}}
{{--                            <input type="text"  class="text"  placeholder="ایمیل">--}}
{{--                            <input type="text"  class="text" placeholder="شماره">--}}
{{--                            <input type="text"  class="text" placeholder="آی پی">--}}
{{--                            <input type="text"  class="text margin-bottom-20" placeholder="نام و نام خانوادگی">--}}
{{--                            <btutton class="btn btn-webamooz_net">جستجو</btutton>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>شماره موبایل</th>
                    <th>سطح کاربری</th>   {{-- TODO: dynamic this section --}}
                    <th>تاریخ عضویت</th>  {{-- TODO: dynamic this section --}}
{{--                    <th>ای پی</th>--}}
{{--                    <th>درحال یادگیری</th>--}}
                    <th>وضعیت حساب</th>
{{--                    <th>عملیات</th>--}}
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr role="row" class="">
                            <td><a href="">{{ $user->id }}</a></td>
                            <td><a href="">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>کاربر عادی</td>
                            <td>1399/11/11</td>
{{--                            <td>148.12.12.1</td>--}}
{{--                            <td>5 دوره</td>--}}
                            <td>@lang($user->status)</td>
{{--                            <td>--}}
{{--                                <a href="" class="item-delete mlg-15" title="حذف"></a>--}}
{{--                                <a href="" class="item-confirm mlg-15" title="تایید"></a>--}}
{{--                                <a href="" class="item-reject mlg-15" title="رد"></a>--}}
{{--                                <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>--}}
{{--                                <a href="" class="item-edit " title="ویرایش"></a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
