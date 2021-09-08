<div class="container">
        <div>
            <!--- if any errors when deleting a receptionist profile ----------->
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!--- if receptionist profile is deleted successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            </div>

            <div class="container">
                @if(Auth::user()->profile->has_handle_authority_request && !Auth::user()->profile->is_super)
                <div class="row">
                    <div class="alert alert-success">
                        <h4 class="text-success">{{ __('lang.admin.recieved_authorities_request')}}</h4>
                        <a href="{{route('admin.confirm.authorities.request')}}" class="btn btn-success">{{ __('lang.admin.confirm')}}</a>
                        <a href="{{route('admin.cancel.authorities.request')}}" class="btn btn-danger">{{ __('lang.admin.cancel')}}</a>
                    </div>
                </div>
                @endif

                <!--------------------- title ------------------------>
                <h2> {{ __('lang.admin.welcome')}}</h2>

                <!------------------- badges --------------------------->
                @include('admin.sections.welcome_dashboard.upper_badges')

                <!------------------- counts board --------------------------->

                @include('admin.sections.welcome_dashboard.counts_section')

                <!------------------- charts board --------------------------->
                @include('admin.sections.welcome_dashboard.charts')
            </div>
</div>



