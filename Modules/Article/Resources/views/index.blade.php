@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{ route('articles.index') }}">لیست مقالات</a>
                <a class="tab__item " href="{{ route('articles.create') }}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
{{--            <div class="t-header-search">--}}
{{--                <form action="" >--}}
{{--                    <div class="t-header-searchbox font-size-13">--}}
{{--                        <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی مقاله">--}}
{{--                        <div class="t-header-search-content ">--}}
{{--                            <input type="text"  class="text"  placeholder="نام مقاله">--}}
{{--                            <input type="text"  class="text margin-bottom-20" placeholder="نام نویسنده">--}}
{{--                            <btutton class="btn btn-webamooz_net">جستجو</btutton>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>

        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>تصویر</th>
{{--                    <th>نویسنده</th>--}}
{{--                    <th>تاریخ ایجاد</th>--}}   {{-- TODO: dynamic this section  --}}
{{--                    <th>تعداد بازدید ها</th>--}}
{{--                    <th>تعداد نظرات</th>--}}
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                <tr role="row" class="">
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
{{--                    <td>توفیق حمزئی</td>--}}
{{--                    <td>1399/11/11</td>--}}
{{--                    <td>101</td>--}}
                    <td><img src="/storage/{{ $article->banner }}" alt="" width="130" height="80"></td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="item-delete mlg-15" title="حذف"></button>
                        </form>
{{--                        <a href="" class="item-reject mlg-15" title="رد"></a>--}}
                        <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
{{--                        <a href="" class="item-confirm mlg-15" title="تایید"></a>--}}
                        <a href="{{ route('articles.edit', $article->id) }}" class="item-edit" title="ویرایش"></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
