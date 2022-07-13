@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش بنر</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('banners.update', $banner->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" class="text" name="title" value="{{ $banner->title }}" placeholder="عنوان ">
                    @error('title')
                    <span>{{ $message }}</span>
                    @enderror

                    <select name="status">
                        <option value="">یک مورد را انتخاب کنید</option>
                        <option value="active" {{ $banner->stauts == 'active' ? 'selected' : '' }}>فعال</option>
                        <option value="inactive" {{ $banner->stauts == 'inactive' ? 'selected' : '' }}>غیر فعال</option>
                    </select>
                    @error('status')
                    <span>{{ $message }}</span>
                    @enderror
                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود تصویر</span>
                            <input type="file" class="file-upload" name="banner"/>
                        </div>
                        <span class="filesize"></span>
{{--                        <span class="selectedFiles">فایلی انتخاب نشده است</span>--}}
                        <div>
                            <img src="/storage/{{ $banner->banner }}" width="130" height="80" alt="">
                        </div>
                    </div>
                    @error('banner')
                    <span>{{ $message }}</span>
                    @enderror

                    <button class="btn btn-webamooz_net" type="submit">ذخیره</button>
                </form>
            </div>
        </div>
    </div>
@endsection
