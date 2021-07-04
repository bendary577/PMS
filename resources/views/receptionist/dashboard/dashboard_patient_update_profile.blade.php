@extends('layouts.dashboard')

@section('content')
    <!-- Page Content  -->
    <div id="content">
        @include('includes.dashboard_navbar')
        @include('receptionist.sections.update_patient_profile')
    </div>
@endsection
