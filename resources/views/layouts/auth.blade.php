<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    @include('includes.heads.auth_head')
</head>
<body id="main" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" class="{{(App::isLocale('ar') ? 'text-left' : 'text-right')}}">
    @include('includes.auth_navbar')
    @yield('content')
</body>
</html>
