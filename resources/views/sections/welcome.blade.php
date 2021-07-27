<div class="welcome w-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-flex align-items-center mt-5">
                <div class="welcome_title ">
                    <h2>{{ __('lang.welcome')}}</h2>
                    <a href="{{route('register')}}" class="btn btn-primary btn-lg">{{ __('lang.getStarted')}}</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="{{url('/images/home/welcome/welcome.png')}}" width="600" height="450" alt="welcome" />
            </div>
        </div>
    </div>
</div>