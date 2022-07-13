@extends('dashboard::layouts.master')
@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش  اسلاید </p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('slider.update', $slider->id) }}" class="padding-30" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" class="text" name="title" placeholder="عنوان اسلاید" value="{{ $slider->title }}">
{{--                    <input type="text" class="text text-left " value="{{ $slider->status }}" placeholder="لینک اسلاید">--}}
                    <select name="status">
                        <option value="">یک مورد را انتخاب کنید</option>
                        <option value="active" {{ $slider->stauts == 'active' ? 'selected' : '' }}>فعال</option>
                        <option value="inactive" {{ $slider->stauts == 'inactive' ? 'selected' : '' }}>غیر فعال</option>
                    </select>

                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود تصویر</span>
                            <input type="file" class="file-upload" name="slide"/>
                        </div>
                        <span class="filesize"></span>
{{--                        <span class="selectedFiles">فایلی انتخاب نشده است</span>--}}
                        <div>
                            <img src="/storage/{{ $slider->slide }}" width="130" height="80" alt="">
                        </div>
                    </div>

                    <button class="btn btn-webamooz_net">ذخیره</button>
                </form>
            </div>
        </div>
    </div>
@endsection
