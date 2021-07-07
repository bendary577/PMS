<div class="container">

    <!--- if any errors when deleting a receptionist profile ----------->
    @if (Session::has('success'))
        <div class="alert alert-danger">{{ Session::get('success') }}</div>
    @endif

    <!--- if any errors when deleting a receptionist profile ----------->
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    @if($clinic)
    <div class="my-5 title">
    <div class="d-flex">
        <h2>Dr. {{ Auth::user()->name }} Clinic</h2>
        <a href="{{route('doctor.delete.clinic_hours')}}" class="btn btn-danger ml-2">delete clinic</a>
    </div>
    @if(isset(Auth::user()->profile->medicalSpeciality))
    <p class="mt-2">Diapetes Clinic</p>
    @else
    <p class="mt-2">no medical speciality chosen yet</p>
    @endif
    <p<p class="mt-2">{{ Auth::user()->profile->clinic->department}} department</p>
    </div>
    <div class="row">
            <h3>Working Hours</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">from</th>
                        <th scope="col">to</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$clinic->available_from}}</td>
                        <td>{{$clinic->available_to}}</td>
                        <td><a href="{{route('doctor.edit.clinic_hours')}}" class="btn btn-info">edit working hours</a>
                    </tr>
                </tbody>
            </table>
    </div>
    <div class="">
            <h3>Patients Appointments List</h3>
            @if(count($clinic->appointments)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">date</th>
                        <th scope="col">hour</th>
                        <th scope="col">Appointment Reason</th>
                        <th scope="col">diagnoses</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clinic->appointments as $appointment)
                    <tr>
                        <th scope="row">{{ $appointment->patient->name }}</th>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->from }}</td>
                        <td>{{ $appointment->reason}}</td>
                        @if(isset($appointment->patient->diagnoses))
                        <td>{{ $appointment->patient->diagnoses }}</td>
                        @else
                        <td>no diagnoses yet</td>
                        @endif
                        <td><a href="{{route('doctor.clinic.patient_file', ['id' => $appointment->patient->id ])}}" class="btn btn-success">check patient file</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <h4 class="text-success">No patient list appointments in your clinic yet</h4>
            @endif
    </div>
    @endif
</div>