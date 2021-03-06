<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header text-center">
        <h3>{{ __('lang.dashboard.dashboard')}}</h3>
        @if(Auth::user()->getHasAdminProfileAttribute())
        <img src="{{url('/images/dashboard/settings.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
        @elseif(Auth::user()->getHasDoctorProfileAttribute())
        <img src="{{url('/images/dashboard/doctor.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
        @else
        <img src="{{url('/images/dashboard/receptionist.png')}}" class="mt-2" width="100" height="100" alt="welcome" />
        @endif
    </div>
    <ul class="list-unstyled components" class="text-dark">
        <p class="text-white font-weight-bold text-center">{{ __('lang.dashboard.welcome', ['name' => Auth::user()->username])}}</p>
        
        <!-------------------------------------------------------------- Profile ---------------------------------------->
        <li>
            <div class="d-flex">
                <div class="">
                    <img src="{{url('/images/dashboard/profile.png')}}" class="mt-3 mx-2" width="25" height="25" alt="welcome" />
                </div>
                <div class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-white">{{ __('lang.dashboard.profile')}}</a>
                </div>
            </div>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('profile')}}" class="text-white">{{ __('lang.dashboard.my_profile')}}</a> 
                </li>
                <li>
                    @if(Auth::user()->getHasAdminProfileAttribute())
                        <a href="{{route('admin.edit.profile')}}" class="text-white">{{ __('lang.dashboard.edit_profile')}}</a>
                    @elseif(Auth::user()->getHasDoctorProfileAttribute())
                        <a href="{{route('doctor.edit.profile')}}" class="text-white">{{ __('lang.dashboard.edit_profile')}}</a>
                    @else
                        <a href="{{route('receptionist.edit.profile')}}" class="text-dawhiterk">{{ __('lang.dashboard.edit_profile')}}</a>
                    @endif
                </li>
            </ul>
        </li>

        <!-------------------------------------------------------------- Actions ---------------------------------------->
        <li>
                <div class="d-flex">
                    <div class="">
                        <img src="{{url('/images/dashboard/actions.png')}}" class="mt-3 mx-2" width="25" height="25" alt="welcome" />
                    </div>
                    <div class="">
                        <a href="#pageSubmenu" id="pageSubmenu" data-toggle="collapse" aria-expanded="false" aria-haspopup="true" class="dropdown-toggle text-white">{{ __('lang.dashboard.actions')}}</a>
                    </div>
                </div>
            
                <ul class="collapse list-unstyled" id="pageSubmenu" aria-labelledby="pageSubmenu">
                    @if(Auth::user()->getHasAdminProfileAttribute())
                        <li>
                            <a href="{{route('admin.registration.requests')}}" class="text-white">{{ __('lang.dashboard.registration_requests')}}</a>
                        </li>
                        <li>
                            <a href="{{route('admin.receptionists')}}" class="text-white">{{ __('lang.dashboard.receptionists')}}</a>
                        </li>
                        <li>
                            <a href="{{route('admin.doctors')}}" class="text-white">{{ __('lang.dashboard.doctors')}}</a>
                        </li>
                        <li>
                            <a href="{{route('admin.medical.specialities')}}" class="text-white">{{ __('lang.dashboard.medical_specialities')}}</a>
                        </li>
                    @elseif(Auth::user()->getHasDoctorProfileAttribute())
                        @if(isset(Auth::user()->profile->clinic))
                            <li>
                                <a href="{{route('doctor.clinic')}}" class="text-white">{{ __('lang.dashboard.clinic')}}</a>
                            </li>
                        @else
                            <li>
                                <p class="text-danger" >{{ __('lang.dashboard.no_clinic')}}</p>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('doctor.doctor.file', ['id' => Auth::user()->profile->id])}}">{{ __('lang.dashboard.file_history')}}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('receptionist.patients')}}" class="text-white">{{ __('lang.dashboard.patients')}}</a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.clinics')}}" class="text-white">{{ __('lang.dashboard.clinics')}}</a>
                        </li>
                        <li>
                            <a href="{{route('receptionist.doctors')}}" class="text-white">{{ __('lang.dashboard.doctors')}}</a>
                        </li>
                    @endif
                </ul>
        </li>
</nav>

    
