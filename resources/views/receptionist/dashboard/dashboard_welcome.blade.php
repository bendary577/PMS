@extends('layouts.dashboard')

@section('content')
        <!-- Page Content  -->
        <div id="content">
            @include('includes.dashboard_navbar')
            <div class="container">
                <div class="row">
                    <h2>{{__('lang.rec.welcome')}}</h2>
                </div>
            </div>
        </div>
@endsection
