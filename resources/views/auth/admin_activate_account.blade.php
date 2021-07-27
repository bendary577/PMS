@extends('layouts.auth')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('/images/auth/login/login.png')}}" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

        @if(isset($email))
        <form method="POST" action="{{route('activate.admin', ['email' => $email])}}">
        {{ csrf_field() }}

            <!--- if user is added is added successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <!--- if user is added is added successfully ----------->
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!--- if user is not added successfully ----------->
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

          <!-- security code input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="{{ __('lang.signup.code')}}" name="security_code"/>
            <label class="form-label" for="form3Example3">{{ __('lang.signup.code')}}</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('lang.submit')}}
            </button>
          </div>  
         
        </form>
        @else
        <h1>hello</h1>
        @endif

      </div>
    </div>
  </div>
</section>
@endsection
