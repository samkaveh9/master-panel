@extends('dashboard::layouts.master')

@section('content')
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسترسی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نقش کاربری</th>
                            <th>مجوزها</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr role="row" class="">
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($role->permissions as $permission)
                                            <li>@lang($permission->name)</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a class="item-delete mlg-15" href="{{ route('permissions.destroy', $role->id) }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    </a>

                                    <form id="logout-form" action="{{ route('permissions.destroy', $role->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('permissions.edit', $role->id) }}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد نقش کاربری</p>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('permissions.store') }}" method="post" class="padding-30">
                    @csrf
                    <input type="text" name="name" id="name" placeholder="عنوان" class="text">
                    @error('name')
                    <span>
                            {{ $message }}
                        </span>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب مجوز</p>

                    @foreach($permissions as $permission)
                    <label class="ui-checkbox" >
                        <input type="checkbox" name="permissions[{{ $permission->name }}]" class="sub-checkbox"
                            {{ is_array(old('permissions')) && array_key_exists($permission->name, old('permissions')) == true ? 'checked' : '' }}
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

                    <button class="btn btn-webamooz_net" type="submit">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/panel/js/tagsInput.js') }}"></script>
@endpush
