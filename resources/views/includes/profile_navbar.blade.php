<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        Hospita
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          @if(Auth::user()->getHasReceptionistProfileAttribute())
            <a class="nav-link" href="{{route('receptionist.dashboard')}}">Dashboard</a>
          @elseif(Auth::user()->getHasDoctorProfileAttribute())
          <a class="nav-link" href="{{route('doctor.dashboard')}}">Dashboard</a>
          @else
          <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
          @endif
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('profile')}}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">

      <!-- Avatar -->
      <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
      @if(isset(Auth::user()->profile->avatar_path))
        <img
          src="{{url(Auth::user()->profile->avatar_path)}}"
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
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="#">My profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Settings</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Logout</a>
        </li>
      </ul>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
