@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.admin_dashboard_navbar')
            @include('admin.sections.update_medical_speciality')
        </div>
@endsection
