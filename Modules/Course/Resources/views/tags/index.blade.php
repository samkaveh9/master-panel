@section('title', 'برچسب ها')
@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">برچسب ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام برچسب</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr role="row" class="">
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a class="item-delete mlg-15" href="{{ route('tags.destroy', $tag->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    </a>

                                    <form id="logout-form" action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="d-none">
                                        @csrf     {{--  TODO: form delete problem in all CRUD  --}}
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('tags.edit', $tag->id) }}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد برچسب جدید</p>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tags.store') }}" method="post" class="padding-30">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="نام برچسب" class="text">
                    @error('name')
                    <span>
                            {{ $message }}
                        </span>
                    @enderror

                    <button class="btn btn-webamooz_net" type="submit">افزودن</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/panel/js/tagsInput.js') }}"></script>
@endpush
