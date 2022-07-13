@extends('dashboard::layouts.master')
@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش دسته بندی</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('categories.update', $category->id) }}" method="post" class="padding-30">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="name" placeholder="نام دسته بندی" class="text" value="{{ $category->name }}">
                    @error('name')
                    <span>
                        {{ $message }}
                    </span>
                    @enderror
                    <p class="box__title margin-bottom-15"> دسته پدر</p>
                    <select name="parent_id" id="parent_id">
                        <option value="">ندارد</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-webamooz_net" type="submit">ویرایش</button>
                </form>
            </div>
        </div>
    </div>
@endsection
