<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
    <div class="profile__info border cursor-pointer text-center">
        <form class="d-contents" action="{{ route('user.store.profile', auth()->id()) }}" method="post" enctype="multipart/form-data" id="image-profile">
            @csrf
            @method('PUT')
            <div class="avatar__img"><img src="{{ auth()->user()->image != '' ? '/storage/'. auth()->user()->image : '/assets/panel/img/pro.jpg' }}" class="avatar___img">
                <input type="file" name="image" accept="image/*" class="hidden avatar-img__input" onchange="document.getElementById('image-profile').submit();">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
        </form>
        <span class="profile__name">کاربر : {{ auth()->user()->name }}</span>
    </div>

    <ul>
        <li class="item-li i-dashboard is-active"><a href="{{ route('dashboard.index') }}">پیشخوان</a></li>
        <li class="item-li i-courses "><a href="{{ route('courses.index') }}">دوره ها</a></li>
        <li class="item-li i-users"><a href="{{ route('users.index') }}"> کاربران</a></li>
        <li class="item-li i-categories"><a href="{{ route('categories.index') }}">دسته بندی ها</a></li>
        <li class="item-li i-user__permission"><a href="{{ route('permissions.index') }}">نقش های کاربری</a></li>
        <li class="item-li i-slideshow"><a href="{{ route('slider.index') }}">اسلایدشو</a></li>
        <li class="item-li i-banners"><a href="{{ route('banners.index') }}">بنر ها</a></li>
        <li class="item-li i-articles"><a href="{{ route('articles.index') }}">مقالات</a></li>
{{--        <li class="item-li i-ads"><a href="ads.html">تبلیغات</a></li>--}}
{{--        <li class="item-li i-comments"><a href="comments.html"> نظرات</a></li>--}}
{{--        <li class="item-li i-tickets"><a href="tickets.html"> تیکت ها</a></li>--}}
{{--        <li class="item-li i-discounts"><a href="discounts.html">تخفیف ها</a></li>--}}
{{--        <li class="item-li i-transactions"><a href="transactions.html">تراکنش ها</a></li>--}}
{{--        <li class="item-li i-checkouts"><a href="checkouts.html">تسویه حساب ها</a></li>--}}
{{--        <li class="item-li i-checkout__request "><a href="checkout-request.html">درخواست تسویه </a></li>--}}
{{--        <li class="item-li i-my__purchases"><a href="mypurchases.html">خرید های من</a></li>--}}
{{--        <li class="item-li i-my__payments"><a href="mypeyments.html">پرداخت های من</a></li>--}}
{{--        <li class="item-li i-notification__management"><a href="">مدیریت اطلاع رسانی</a></li>--}}
        <li class="item-li i-user__information"><a href="{{ route('user.info', auth()->id()) }}">اطلاعات کاربری</a></li>
    </ul>

</div>
