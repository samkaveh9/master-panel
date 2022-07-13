@section('title', 'دسته بندی ها')
@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent }}</td>
                                <td>
                                    <a class="item-delete mlg-15" href="{{ route('categories.destroy', $category->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    </a>

                                    <form id="logout-form" action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('categories.edit', $category->id) }}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categories.store') }}" method="post" class="padding-30">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="نام دسته بندی" class="text">
                    @error('name')
                    <span>
                            {{ $message }}
                        </span>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="parent_id" id="parent_id">
                        <option value="">ندارد</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-webamooz_net" type="submit">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/panel/js/tagsInput.js') }}"></script>
@endpush
