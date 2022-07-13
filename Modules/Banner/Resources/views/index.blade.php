@extends('dashboard::layouts.master')
@section('content')
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('banners.index') }}">لیست بنر ها ها</a>
                <a class="tab__item " href="{{ route('banners.create') }}">ایجاد بنر جدید</a>

            </div>
        </div>
        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th class="p-r-90">شناسه</th>
                    <th>عنوان</th>
                    <th>تصویر</th>
{{--                    <th>لینک</th>--}}
                    <th>وضعیت</th>
{{--                    <th>تاریخ ایجاد</th>--}}
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                        <tr role="row" class="">
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->title ?? 'بدون عنوان' }}</td>
                            <td><img class="img__slideshow" src="/storage/{{ $banner->banner }}" width="128" height="30"></td>
                            <td>@lang($banner->status)</td>
                            <td>
                                <a href="" class="item-reject mlg-15" title="رد"></a>
                                <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="" class="item-confirm mlg-15" title="تایید"></a>
                                <a href="{{ route('banners.edit', $banner->id) }}" class="item-edit" title="ویرایش"></a>
                                <form action="{{ route('banners.destroy', $banner->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item-delete mlg-15" title="حذف"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
