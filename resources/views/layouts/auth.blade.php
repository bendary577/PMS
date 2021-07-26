<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.heads.auth_head')
</head>
<body id="main" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    @yield('content')
</body>
</html>
