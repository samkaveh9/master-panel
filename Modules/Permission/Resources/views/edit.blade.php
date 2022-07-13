@extends('dashboard::layouts.master')
@section('content')
    <div class="main-content padding-0">
        <p class="box__title">ویرایش دسته بندی</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('permissions.update', $role->id) }}" method="post" class="padding-30">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" id="name" placeholder="عنوان" class="text" value="{{ $role->name }}">
                    @error('name')
                    <span>
                            {{ $message }}
                        </span>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب مجوز</p>

                    @foreach($permissions as $permission)
                        <label class="ui-checkbox" >
                            <input type="checkbox" name="permissions[{{ $permission->name }}]" class="sub-checkbox"
                                   {{ $role->hasPermissionTo($permission->name) == true ? 'checked' : '' }}
                                   value="{{ $permission->name }}"
                            >
                            <span class="checkmark"></span>
                            @lang($permission->name)
                        </label>
                    @endforeach

                    @error('permissions')
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
