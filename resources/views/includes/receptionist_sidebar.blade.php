<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header text-center">
        <h3>Dashboard</h3>
        <img src="{{url('/images/dashboard/dashboard.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
    </div>
    <ul class="list-unstyled components">
        <p class="text-white font-weight-bold text-center">welcome {{ Auth::user()->username }}</p>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('profile')}}">My Profile</a>
                </li>
                <li>
                    @if(Auth::user()->getHasAdminProfileAttribute())
                        <a href="{{route('profile')}}">Edit Profile</a>
                    @elseif(Auth::user()->getHasDoctorProfileAttribute())
                        <a href="{{route('doctor.edit.profile')}}">Edit Profile</a>
                    @else
                        <a href="{{route('receptionist.edit.profile')}}">Edit Profile</a>
                    @endif
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Actions</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    @if(Auth::user()->getHasAdminProfileAttribute())
                        <li>
                            <a href="{{route('admin.registration.requests')}}">Registration Requests</a>
                        </li>
                        <li>
                            <a href="{{route('admin.receptionists')}}">Receptionists</a>
                        </li>
                        <li>
                            <a href="{{route('admin.doctors')}}">Doctors</a>
                        </li>
                        <li>
                            <a href="{{route('admin.medical.specialities')}}">Medical Specialities</a>
                        </li>
                    @elseif(Auth::user()->getHasDoctorProfileAttribute())
                        @if(isset(Auth::user()->profile->clinic))
                            <li>
                                <a href="{{route('doctor.clinic')}}">Clinic</a>
                            </li>
                        @else
                            <li>
                                <p class="text-danger">No Clinic Yet!</p>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('doctor.doctor.file', ['id' => Auth::user()->profile->id])}}">File History</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('receptionist.patients')}}">Patients</a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.clinics')}}">Clinics</a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.doctors')}}">Doctors</a>
                        </li>
                    @endif
                </ul>
        </li>
</nav>

    
