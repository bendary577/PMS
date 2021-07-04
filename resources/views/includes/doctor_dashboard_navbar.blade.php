<nav class="upper_navbar navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            @if(Auth::user()->getHasDoctorProfileAttribute())
                                @if(isset(Auth::user()->profile->clinic))
                                    <li class="nav-item active">             
                                        <a class="nav-link" href="{{route('doctor.clinic')}}">
                                            <div class="text-center">
                                                <img src="{{url('/images/dashboard/patients.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                                <p>clinic</p>
                                            </div>
                                        </a>
                                    </li>
                                @else
                                <li class="nav-item active">          
                                        <a class="nav-link" href="{{route('doctor.add.clinic')}}">
                                            <div class="text-center">
                                                <img src="{{url('/images/dashboard/patients.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                                <p class="text-danger">No Clinic Yet!</p>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('doctor.doctor.file', ['id' => Auth::user()->profile->id])}}">
                                    <div class="text-center">
                                        <img src="{{url('/images/dashboard/clinics.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                        <p>file history</p>
                                    </div>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>