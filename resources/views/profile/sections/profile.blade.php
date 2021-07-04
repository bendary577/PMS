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
                    <p>Doctor</p>
                    @elseif(Auth::user()->getHasReceptionistProfileAttribute())
                    <p>Receptionist</p>
                    @else
                    <p>admin</p>
                    @endif
                    <!------------------- doctor medical speciality ------------------------>
                    @if(Auth::user()->getHasDoctorProfileAttribute())
                        @if(isset(Auth::user()->profile->medicalSpeciality))
                        <p>{{ Auth::user()->profile->medicalSpeciality->name }}</p>
                        @else
                        <p class="text-danger">No Medical Speciality Chosen</p>
                        @endif
                    @endif
                    <!------------------- about description ------------------------>
                    @if(isset(Auth::user()->profile->about))
                    <p>{{ Auth::user()->profile->about }}</p>
                    @else
                    <p>no about description</p>
                    @endif
                    <!------------------- edit profile link ------------------------>
                    @if(Auth::user()->getHasDoctorProfileAttribute())
                    <a href="{{route('doctor.edit.profile')}}" class="text-primary">edit profile</a>
                    @elseif(Auth::user()->getHasReceptionistProfileAttribute())
                    <a href="{{route('receptionist.edit.profile')}}" class="text-primary">edit profile</a>
                    @else
                    <a href="{{route('admin.edit.profile')}}" class="text-primary">edit profile</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>