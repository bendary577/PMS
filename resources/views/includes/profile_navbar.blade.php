<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        {{ __('lang.accnav.brand')}}
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          @if(Auth::user()->getHasReceptionistProfileAttribute())
            <a class="nav-link" href="{{route('receptionist.dashboard')}}">{{ __('lang.accnav.dashboard')}}</a>
          @elseif(Auth::user()->getHasDoctorProfileAttribute())
          <a class="nav-link" href="{{route('doctor.dashboard')}}">{{ __('lang.accnav.dashboard')}}</a>
          @else
          <a class="nav-link" href="{{route('admin.dashboard')}}">{{ __('lang.accnav.dashboard')}}</a>
          @endif
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profile')}}">{{ __('lang.accnav.profile')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('change.language', ['lang' => app()->getLocale() == 'en' ? 'ar' : 'en' ])}}">{{ app()->getLocale() == 'en' ? 'اللغة العربية' : 'english' }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">{{ __('lang.accnav.logout')}}</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

      @if(isset(Auth::user()->avatar_path))
        <img
          src="{{url(Auth::user()->avatar_path)}}"
          class="rounded-circle"
          height="30"
          width="30"
          loading="lazy"
        />
      @else
      <img
          src="{{url('/images/profile/avatar.jpg')}}"
          class="rounded-circle"
          height="30"
          width="30"
          alt=""
          loading="lazy"
        />
      @endif

    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
