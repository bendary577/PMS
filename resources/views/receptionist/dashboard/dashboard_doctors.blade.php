@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.dashboard_navbar')
            @include('receptionist.sections.doctors')
        </div>
@endsection
