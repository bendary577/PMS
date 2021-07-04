@extends('layouts.auth')

@section('content')
<section class="vh-100">
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
                <h3>System Registration</h3>
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

        <!-- complete name input -->
        <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter your name" name="name"/>
            <label class="form-label" for="form3Example3">Complete Name</label>
          </div>

          <!-- Username input -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid username" name="username"/>
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password"/>
            <label class="form-label" for="form3Example4">Password</label>
          </div>

            <!-- Confirm Password input -->
           <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="confirmPassword"/>
            <label class="form-label" for="form3Example4">Confirm Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="radio" value="receptionist" name="account" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                receptionist
              </label>
            </div>

            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="radio" value="doctor" name="account" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                doctor
              </label>
            </div>

            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="radio" value="admin" name="account" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                admin
              </label>
            </div>

          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Register
            </button>
            <p class="small fw-bold mt-2 pt-1 mb-0">already have an account? <a href="{{route('login')}}"class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
@endsection
