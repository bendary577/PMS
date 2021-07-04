@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.admin_dashboard_navbar')
            @include('profile.sections.admin_edit_profile')
        </div>
@endsection
