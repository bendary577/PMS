<div class="container">

    <div class="go_back mb-4"><a href="{{ url()->previous() }}"><h6 class="text-primary">< go back</h6></a></div>
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
                        <a href="{{route('receptionist.patient.download.card', ['id' => $patient->id])}}" class="btn btn-info mt-2">download</a>
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
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @if($diagnoses)
                <div class="title my-4"><h3>{{ __('lang.rec.diagnoses')}}</h3></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th  scope="col">{{ __('lang.rec.diagnose_name')}}</th>
                            <th scope="col">{{ __('lang.rec.dose')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnoses as $diagnose)
                            <tr>
                                <th scope="row">{{ $diagnose->name }}</th>
                                <td>{{ $diagnose->protocol }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="d-flex col-md-12">
                <div>
                    <h4 class="text-success">{{ __('lang.rec.no_diagnose')}}</h4>
                </div>
                <div>
                    <a href="javascript:void(0);" id="add_diagnose" class="ml-2 btn btn-success">{{ __('lang.doctor.add_diagnose')}}</a>
                </div>
            </div>
            <div id="add_diagnose_div" class="col-md-12">
                    <!--- if diagnose is added successfully ----------->
                    @if (Session::has('success'))
                        <div class="alert alert-success my-2">{{ Session::get('success') }}</div>
                    @endif

                    <!--- if diagnose is not added successfully ----------->
                    @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
            </div>
            <script>
                $(document).ready(function(){
                    $('#add_diagnose').click(function() {
                        let div = document.getElementById("add_diagnose_div");
                        let add_diagnose_form = {!! json_encode($add_diagnose_form, JSON_HEX_TAG) !!};
                        if(div.childElementCount === 0){
                            $('#add_diagnose_div').append(add_diagnose_form); 
                        }
                    });
                });
            </script>
            @endif
        </div>
        <!--
        <div class="row"> 
            <div class="title my-4"><h3>Follow Up Dates</h3></div>
            @if(count($patient->appointments) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">follow up date</th>
                            <th scope="col">from</th>
                            <th scope="col">to</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient->appointments as $appointment)
                            <tr>
                                <th scope="row">{{ $appointment->date }}</th>
                                <th scope="row">{{ $appointment->from }}</th>
                                <th scope="row">{{ $appointment->to }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-success">patient has no midicine doses available</h4>
            @endif
        </div>
        -->
    @else
        <h3 class="text-danger">{{ __('lang.rec.no_patient')}}</h3>
    @endif
</div>

