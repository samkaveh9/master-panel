@section('title', 'برچسب ها')

@extends('dashboard::layouts.master')
@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش برچسب</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('tags.update', $tag->id) }}" method="post" class="padding-30">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="name" placeholder="نام برچسب" class="text" value="{{ $tag->name }}">
                    @error('name')
                    <span>
                        {{ $message }}
                    </span>
                    @enderror
                    <button class="btn btn-webamooz_net" type="submit">ویرایش</button>
                </form>
            </div>
        </div>
    </div>
@endsection
