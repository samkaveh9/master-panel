@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش مقاله </p>

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
                <form action="{{ route('articles.update', $article->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" id="title" class="text" placeholder="عنوان مقاله" value="{{ $article->title }}">

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
                            <input type="file" class="file-upload" id="files" name="banner" value="{{ $article->banner }}" />
                        </div>
                        <span class="filesize"></span>
{{--                        <span class="selectedFiles">فایلی انتخاب نشده است</span>--}}
                        <div>
                            <img src="/storage/{{ $article->banner }}" width="130" height="80" alt="">
                        </div>
                    </div>

                    <textarea class="text" name="content" id="editor" placeholder="متن مقاله">{{ $article->content }}</textarea>

                    <button class="btn btn-webamooz_net mt-4" type="submit">ویرایش مقاله</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        initSample();
    </script>
@endpush
