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
                <div class="row my-4">
                    <div class="col-md-3">
                        <a class="badge badge-pill badge-light shadow d-flex justify-content-center" style="width:200px;height:50px">
                            <h3>Light</h3>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a class="badge badge-pill badge-light shadow d-flex justify-content-center" style="width:200px;height:50px">
                            <h3>Light</h3>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a class="badge badge-pill badge-light shadow d-flex justify-content-center" style="width:200px;height:50px">
                            <h3>Light</h3>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a class="badge badge-pill badge-light shadow d-flex justify-content-center" style="width:200px;height:50px">
                            <h3>Light</h3>
                        </a>
                    </div>
                </div>

                <!------------------- counts board --------------------------->
                <div class="row my-4">
                    <div class="col-md-8">
                    @include('admin.sections.welcome_dashboard.counts_section')
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow" style="height:100%">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <div class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------- charts board --------------------------->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <div>{!! $receptionistsChart->container() !!} </div>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <div>{!! $usersChart->container() !!}</div>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                             </div>
                        </div>
                    </div>
                </div>
        </div>
</div>



