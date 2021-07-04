<!doctype html>
<html>
<head>
    @include('includes.heads.dashboard_head')
</head>
<body>
<div id="main" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    @include('includes.profile_navbar')
    <div class="wrapper">
        @include('includes.receptionist_sidebar')
        @yield('content')
    </div>  
    @include('includes.footer')
</div>
</body>
</html>