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
                        <li class="nav-item active">
                                <a class="nav-link" href="{{route('admin.registration.requests')}}">
                                    <div class="text-center">
                                        <img src="{{url('/images/dashboard/patients.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                        <p>registeration requests</p>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('admin.receptionists')}}">
                                    <div class="text-center">
                                        <img src="{{url('/images/dashboard/patients.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                        <p>receptionists</p>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('admin.doctors')}}">
                                    <div class="text-center">
                                        <img src="{{url('/images/dashboard/clinics.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                        <p>doctors</p>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('admin.medical.specialities')}}">
                                    <div class="text-center">
                                        <img src="{{url('/images/dashboard/patients.png')}}" class="mt-2" width="20" height="20" alt="welcome" />
                                        <p>medical specialities</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>