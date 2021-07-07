<div class="container">

    <div class="go_back mb-4"><a href="{{ url()->previous() }}"><h6 class="text-primary">< go back</h6></a></div>
    @if($patient)
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
            @if(count($patient->medicines) > 0)
                <div class="title my-4"><h3>Medicines</h3></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">dose</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient->medicines as $medicine)
                            <tr>
                                <th scope="row">{{ $medicine->name }}</th>
                                <td>3 rivets</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-success">patient has no midicine doses available</h4>
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