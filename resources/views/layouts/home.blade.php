<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    @include('includes.heads.home_head')
</head>
<body>
<div id="main" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    @include('includes.navbar')
    @yield('content')
    @include('includes.footer')
</div>
</body>
</html> 