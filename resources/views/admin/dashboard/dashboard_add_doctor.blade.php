@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.admin_dashboard_navbar')
            @include('admin.sections.add_doctor')
        </div>
@endsection
