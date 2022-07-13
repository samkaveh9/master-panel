<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>@yield('title', 'داشبورد')</title>
    <link rel="stylesheet" href="{{ asset('assets/panel/css/style.css') }}?v={{ uniqid() }}">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/responsive_991.css') }}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/responsive_768.css') }}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{ asset('assets/panel/css/font.css') }}">
    @stack('styles')
</head>
<body>
@include('dashboard::layouts.sidebar')
<div class="content">
    @include('dashboard::layouts.header')
    @include('dashboard::layouts.breadcrumb')
    @yield('content')
</div>
</body>
<script src="{{ asset('assets/panel/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/panel/js/js.js') }}"></script>
@stack('scripts')
</html>
