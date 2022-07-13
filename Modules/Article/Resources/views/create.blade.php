@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله </p>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('articles.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" id="title" class="text" placeholder="عنوان مقاله" value="{{ old('title') }}">

{{--                    <ul class="tags">--}}
{{--                        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>--}}
{{--                            <input type="hidden" value="dsfsdf" name="tags[]"></li>--}}
{{--                        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>--}}
{{--                            <input type="hidden" value="dsfsdf" name="tags[]"></li>--}}
{{--                        <li class="tagAdd taglist">--}}
{{--                            <input type="text" id="search-field">--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="banner"  />
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>

                    <textarea class="text" name="content" id="content" placeholder="متن مقاله"></textarea>

                    <button class="btn btn-webamooz_net" type="submit">ایجاد مقاله</button>
                </form>
            </div>
        </div>
    </div>
@endsection
