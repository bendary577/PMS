@extends('layouts.dashboard')

@section('content')
    <!-- Page Content  -->
    <div id="content">
         @include('includes.dashboard_navbar')
        @include('receptionist.sections.clinicks')
    </div>
@endsection
