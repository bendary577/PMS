@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.dashboard_navbar')
            @include('profile.sections.receptionist_edit_profile')
        </div>
@endsection
