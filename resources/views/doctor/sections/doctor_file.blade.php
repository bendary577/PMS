<div class="container">
    @if($doctor)
    <div class="title my-4">
        <h2> {{__('lang.doctor.file_title', ['name' =>  $doctor->user->name])}}</h2>
        <a href="" class="btn btn-primary">{{__('lang.doctor.print_pdf')}}</a>
    </div>
    <div class="row">
        <div class="personal_info col-md-6 my-4">
            <div class="card" style="height:340px;">
                <div class="card-header">
                    <h5 class="card-title">{{__('lang.doctor.personal_info')}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $doctor->user->name }}</p>
                    <p class="card-text">{{ $doctor->phone }}</p>
                    <p class="card-text">{{__('lang.doctor.registered_at', ['date' => $doctor->created_at])}}</p>
                </div>
            </div>
        </div>
        <div class="personal_info col-md-6 my-4">
            <div class="card" style="height:340px;">
                    <div class="card-header clearfix">
                        <h5 class="card-title float-left">{{__('lang.doctor.clinic_info')}}</h5>
                        @if($doctor->clinic)
                        <a href="{{route('doctor.clinic')}}" class="text-primary float-right">{{__('lang.doctor.visit')}}</a>
                        @endif
                    </div>
                @if($doctor->clinic)
                    <div class="card-body">
                        <p class="card-text">{{__('lang.doctor.clinic_title' , ['name' => $doctor->user->name])}}</p>
                        @if(isset($doctor->medicalSpeciality))
                            <p class="card-text">{{$doctor->MedicalSpeciality->name}}</p>
                        @else
                            <p class="card-text">{{__('lang.doctor.no_medical_speciality')}}</p>
                        @endif
                    </div>
                @else
                    <div class="card-body">
                        <h4 class="text-success">{{__('lang.doctor.no_clinic')}}</h4>
                        <a href="{{route('doctor.add.clinic')}}" class="text-primary">{{__('lang.doctor.create_clinic')}}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @else
        <h3 class="text-danger">{{__('lang.doctor.no_doctor')}}</h3>
    @endif
</div>