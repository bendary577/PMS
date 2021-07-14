<div class="container">

    <div class="go_back mb-4"><a href="{{ url()->previous() }}"><h6 class="text-primary">< go back</h6></a></div>
    @if($patient || $medical_specialities)
        <div class="title my-4">
            <h2>{{ $patient->name }} File</h2>
            <a href="" class="btn btn-primary">print pdf</a>
        </div>
        <div class="row">
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <div class="clearfix">
                            <h5 class="card-title float-left">Personal Info</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $patient->name }}</p>
                        <p class="card-text">{{ $patient->phone }}</p>
                        <p class="card-text">{{ $patient->gender }}</p>
                        <p class="card-text">birthday at {{ $patient->birthdate }}</p>
                        <p class="card-text">registered at {{ $patient->attendance_date }}</p>
                        <p class="card-text">{{ $patient->age }} years</p>
                    </div>
                </div>
            </div>
            <div class="personal_info col-md-6 my-4">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">Cinic Info</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Clinic Name</p>
                        <p class="card-text">Doctor Name</p>
                        <p class="card-text">Diagnoses info</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="personal_info col-md-6">
                <div class="card" style="height:340px;">
                    <div class="card-header">
                        <h5 class="card-title">Patient Card</h5>
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
                        <h5 class="card-title">Patient Sheet</h5>
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
                            <h4 class="text-success">patient has no sheet image yet!</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($patient->diagnosesDescriptions) > 0)
                <div class="title my-4"><h3>Diagnoses</h3></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Diagnose Name</th>
                            <th scope="col">dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient->diagnosesDescriptions as $diagnose_description)
                            <tr>
                                <th scope="row">$diagnose_description->diagnose->name</th>
                                <td>$diagnose_description->medicines->pivot->dose</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="d-flex col-md-12">
                <div>
                    <h4 class="text-success">patient has no diagnoses available</h4>
                </div>
                <div>
                    <a href="javascript:void(0);" id="add_diagnose" class="ml-2 btn btn-success">add new diagnose</a>
                </div>
            </div>
            <div id="add_diagnose_div" class="col-md-12">
                
            </div>
            <script>
                $(document).ready(function(){
                    $('#add_diagnose').click(function() {
                        let div = document.getElementById("add_diagnose_div");
                        let structure = `<form method="POST" action="{{route('doctor.add.diagnose'}}"></form>`
                        if(div.childElementCount === 0){
                            $('#add_diagnose_div').append(structure); 
                        }
                    });
                });
            </script>
            @endif
        </div>
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
    @else
        <h3 class="text-danger">sorry, patient is not available</h3>
    @endif
</div>

