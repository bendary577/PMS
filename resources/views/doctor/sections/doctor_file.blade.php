<div class="container">
    @if($doctor)
    <div class="title my-4">
        <h2>{{ $doctor->user->name }} File</h2>
        <a href="" class="btn btn-primary">print pdf</a>
    </div>
    <div class="row">
        <div class="personal_info col-md-6 my-4">
            <div class="card" style="height:340px;">
                <div class="card-header">
                    <h5 class="card-title">Personal Info</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $doctor->user->name }}</p>
                    <p class="card-text">{{ $doctor->phone }}</p>
                    <p class="card-text">registered at {{ $doctor->created_at }}</p>
                </div>
            </div>
        </div>
        <div class="personal_info col-md-6 my-4">
            <div class="card" style="height:340px;">
                    <div class="card-header clearfix">
                        <h5 class="card-title float-left">Cinic Info</h5>
                        @if($doctor->clinic)
                        <a href="{{route('doctor.clinic')}}" class="text-primary float-right">visit</a>
                        @endif
                    </div>
                @if($doctor->clinic)
                    <div class="card-body">
                        <p class="card-text">{{$doctor->user->name}} clinic</p>
                        @if(isset($doctor->medicalSpeciality))
                            <p class="card-text">{{$doctor->MedicalSpeciality->name}}</p>
                        @else
                            <p class="card-text">no medical speciality chosen</p>
                        @endif
                    </div>
                @else
                    <div class="card-body">
                        <h4 class="text-success">you don't have a clinic right now</h4>
                        <a href="{{route('doctor.add.clinic')}}" class="text-primary">create one!</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @else
        <h3 class="text-danger">sorry, doctor is not available</h3>
    @endif
</div>