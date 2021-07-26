<div class="container">

    <div class="go_back mb-4"><a href="{{ url()->previous() }}"><h6 class="text-primary">{{ __('lang.go_back')}}</h6></a></div>
    @if($patient)
        <div class="title my-4">
            <h2>{{ __('lang.rec.file_title' , ['name' => $patient->name])}}</h2>
            <a href="" class="btn btn-primary">{{ __('lang.doctor.print_pdf')}}</a>
        </div>
        <div class="row">
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <div class="clearfix">
                            <h5 class="card-title float-left">{{ __('lang.doctor.personal_info') }}</h5>
                            <a href="{{route('receptionist.edit.patient', ['id' => $patient->id ])}}" class="text-primary float-right">{{ __('lang.acc.edit_profile')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $patient->name }}</p>
                        <p class="card-text">{{ $patient->phone }}</p>
                        <p class="card-text">{{ $patient->gender }}</p>
                        <p class="card-text">{{ __('lang.rec.birthdate_at' , [ 'date' => $patient->birthdate])}}</p>
                        <p class="card-text">{{ __('lang.rec.registered_at' , [ 'date' => $patient->attendance_date])}}</p>
                        <p class="card-text">{{ __('lang.rec.age', ['age' => $patient->age])}}</p>
                    </div>
                </div>
            </div>
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.doctor.clinic_info')}}</h5>
                    </div>
                    <div class="card-body">
                        <!--
                        <p class="card-text">Clinic Name</p>
                        <p class="card-text">Doctor Name</p>
                        <p class="card-text">Diagnoses info</p>
                        -->
                        <h5 class="card-title">{{ __('lang.rec.no_clinic')}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="personal_info col-md-6">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.rec.patient_card')}}</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="" style="height:85%;">
                            <img  style="width:100%;height:100%" src="{{url($patient->card_image_path)}}" alt="Card image">
                        </div>
                        <a href="{{route('receptionist.patient.download.card', ['id' => $patient->id])}}" class="btn btn-info mt-2">{{__('lang.download')}}</a>
                    </div>
                </div>
            </div>
            <div class="personal_info col-md-6">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('lang.rec.patient_sheet')}}</h5>
                    </div>
                    @if($patient->sheet_image_path)
                        <div class="card-body text-center">
                            <div class="" style="height:85%;">
                                <img  style="width:100%;height:100%" src="{{url($patient->sheet_image_path)}}" alt="Card image">
                            </div>
                            <a href="{{ route('receptionist.patient.download.sheet', ['id' => $patient->id ]) }}" class="btn btn-info mt-2">download</a>
                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="text-success">{{ __('lang.rec.no_patient_sheet')}}</h4>
                            <form method="POST" action="{{route('receptionist.patient.upload.sheet', ['id' => $patient->id ]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="my-2">
                                    <input type="file" name="sheet_image" accept="image/*"  >
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
                            <form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @if($patient->diagnoses)
                <div class="title my-4"><h3>{{ __('lang.rec.diagnoses')}}</h3></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('lang.rec.diagnose_name')}}</th>
                            <th scope="col">{{ __('lang.rec.dose')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient->diagnoses as $diagnose)
                            <tr>
                                <th scope="row">$diagnose->name</th>
                                <td>$diagnose->name</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-success">{{ __('lang.rec.no_diagnose')}}</h4>
            @endif
        </div>
        <!--
        <div class="row">
            <div class="title my-4"><h3>Follow Up Dates</h3></div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Follow Up Dates</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-success">check schedule</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        -->
    @else
        <h3 class="text-danger">{{ __('lang.rec.no_patient')}}</h3>
    @endif
</div>