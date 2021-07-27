@extends('layouts.auth')

@section('content')
<section class="vh-100 my-5">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{url('/images/auth/registration/signup.png')}}" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="{{route('storeUser')}}">
        {{ csrf_field() }}
            <div class="text-center">
                <h3>{{ __('lang.signup.registration')}}</h3>
            </div>

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

        <div class="admin_div" id="admin_div"></div>

        <!-- complete name input -->
        <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter your name" name="name"/>
            <label class="form-label" for="form3Example3">{{ __('lang.signup.name')}}</label>
          </div>

          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid username" name="username"/>
            <label class="form-label" for="form3Example3">{{ __('lang.signup.username')}}</label>
          </div>

          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email" name="email"/>
            <label class="form-label" for="form3Example3">{{ __('lang.signup.email')}}</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password"/>
            <label class="form-label" for="form3Example4">{{ __('lang.signup.password')}}</label>
          </div>

            <!-- Confirm Password input -->
           <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="confirmPassword"/>
            <label class="form-label" for="form3Example4">{{ __('lang.signup.confirm_password')}}</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="radio" value="receptionist" name="account" id="rec" />
              <label class="form-check-label" for="form2Example3">
              {{ __('lang.signup.receptionist')}}
              </label>
            </div>

            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="radio" value="doctor" name="account" id="doctor" />
              <label class="form-check-label" for="form2Example3">
              {{ __('lang.signup.doctor')}}
              </label>
            </div>

            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="radio" value="admin" name="account" id="admin" class="admin_radio"/>
              <label class="form-check-label" for="form2Example3">
              {{ __('lang.signup.admin')}}
              </label>
            </div>

          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('lang.signup.register')}}
            </button>
            <p class="small fw-bold mt-2 pt-1 mb-0">{{ __('lang.signup.have_account')}} <a href="{{route('login')}}"class="link-danger">{{ __('lang.login')}}</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <script>
                $(document).ready(function(){
                    $('input[name="account"]').change(function() {
                      if($('#admin').prop('checked')){
                        let div = document.getElementById("admin_div");
                        let add_admin_warning = {!! json_encode($add_admin_warning, JSON_HEX_TAG) !!};
                        if(div.childElementCount === 0){
                            $('#admin_div').append(add_admin_warning); 
                        }
                      }else{
                        let div = document.getElementById("admin_div");
                        if(div.childElementCount !== 0){
                          while (div.lastElementChild) {
                            div.removeChild(div.lastElementChild);
                          }
                        }   
                      }
                    });
                });
            </script>
</section>
@endsection
