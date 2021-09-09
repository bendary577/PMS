<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div>
                @if(isset(Auth::user()->profile->avatar_path))
                <img src="{{url(Auth::user()->profile->avatar_path)}}" class="mt-2 border border-dark rounded" width="200" height="200" alt="profile" />
                @else
                <img class="avatar avatar-128 img-circle img-thumbnail" src="{{url('/images/profile/avatar.jpg')}}"/>
                <!--<img src="{{url('/images/profile/user.png')}}" class="mt-2 border border-dark rounded" width="200" height="200" alt="profile" />-->
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div>
                <div class="mt-5">
                    <h3>{{ Auth::user()->name }}</h3>
                    <!------------------- JOB ------------------------>
                    @if(Auth::user()->getHasDoctorProfileAttribute())
                    <p>{{ __('lang.acc.doctor')}}</p>
                    @elseif(Auth::user()->getHasReceptionistProfileAttribute())
                    <p>{{ __('lang.acc.receptionist')}}</p>
                    @else
                    <p>{{ __('lang.acc.admin')}}</p>
                    @endif
                    <!------------------- doctor medical speciality ------------------------>
                    @if(Auth::user()->getHasDoctorProfileAttribute())
                        @if(isset(Auth::user()->profile->medicalSpeciality))
                        <p>{{ Auth::user()->profile->medicalSpeciality->name }}</p>
                        @else
                        <p class="text-danger">{{ __('lang.acc.no_medical_speciality')}}</p>
                        @endif
                    @endif
                    <!------------------- about description ------------------------>
                    @if(isset(Auth::user()->about))
                    <p>{{ Auth::user()->about }}</p>
                    @else
                    <p>{{ __('lang.acc.no_about')}}</p>
                    @endif
                    <!------------------- edit profile link ------------------------>
                    @if(Auth::user()->getHasDoctorProfileAttribute())
                    <a href="{{route('doctor.edit.profile')}}" class="text-primary">{{ __('lang.acc.edit_profile')}}</a>
                    @elseif(Auth::user()->getHasReceptionistProfileAttribute())
                    <a href="{{route('receptionist.edit.profile')}}" class="text-primary">{{ __('lang.acc.edit_profile')}}</a>
                    @else
                    <a href="{{route('admin.edit.profile')}}" class="text-primary">{{ __('lang.acc.edit_profile')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>