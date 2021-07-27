<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Scotch">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Patient Management System</title>

<!-- Scripts -->


@if(Auth::user()->getHasDoctorProfileAttribute())
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
@endif


<script src="{{ asset('js/app.js') }}" defer></script>
   
<script src="{{ asset('js/dashboard.js') }}" defer></script>
<!-- Styles -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">

<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/main.css') }}" rel="stylesheet"> 

<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
