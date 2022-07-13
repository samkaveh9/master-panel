@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ایجاد بنر جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('banners.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="text" name="title" placeholder="عنوان ">
                    @error('title')
                    <span>{{ $message }}</span>
                    @enderror
                    {{--                    <input type="text" class="text text-left"  placeholder="لینک بنر">--}}
                    <select name="status">
                        <option value="">یک مورد را انتخاب کنید</option>
                        <option value="active">فعال</option>
                        <option value="inactive">غیر فعال</option>
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
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
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
