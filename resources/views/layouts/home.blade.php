<!doctype html>
<html>
<head>
    @include('includes.heads.home_head')
</head>
<body><!-- dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" -->
<div  id="main">
    @include('includes.navbar')
    @yield('content')
    @include('includes.footer')
</div>
</body>
</html> 