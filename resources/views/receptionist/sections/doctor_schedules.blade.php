<div class="container">
    <div class="">
    @if($doctor)
        <h4 class="mt-4">{{__('lang.dashboard.clinic')}}</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{__('lang.doctor.table.name')}}</th>
                    <th scope="col">{{__('lang.admin.table.specialization')}}</th>
                    <th scope="col">{{__('lang.doctor.available_from')}}</th>
                    <th scope="col">{{__('lang.doctor.available_to')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $doctor->user->name }}</th>
                    @if(isset($doctor->medicalSpeciality))
                    <td>{{ $doctor->medicalSpeciality->name }}</td>
                    @else
                    <td>{{__('lang.doctor.no_medical_speciality')}}</td>
                    @endif 
                    @if(isset($clinic))
                    <td>{{ date("g:i a", strtotime($clinic->available_from)) }}</td>
                    <td>{{ date("g:i a", strtotime($clinic->available_to)) }}</td>
                    @else
                    <td>--</td>
                    @endif
                </tr>
            </tbody>
        </table>

        @if($clinic)
            <h4 class="mt-4">{{__('lang.doctor.appointment_list')}}</h4>
            @if(count($clinic->appointments) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">{{__('lang.doctor.table.appointment_reason')}}</th>
                        <th scope="col">{{__('lang.doctor.table.date')}}</th>
                        <th scope="col">{{__('lang.doctor.table.from')}}</th>
                        <th scope="col">{{__('lang.doctor.available_to')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clinic->appointments as $appointment)
                    <tr>
                        <th>{{ $appointment->reason }}</th>
                        <th>{{ $appointment->date }}</th>
                        <td>{{ date("g:i a", strtotime($appintment->from)) }}</td>
                        <td>{{ date("g:i a", strtotime($appointment->to)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h4 class="text-danger mt-4">{{__('lang.doctor.no_appointments')}}</h4>
            @endif
        @else
        <h4 class="text-danger mt-4">{{__('lang.dashboard.no_clinic')}}</h4>
        @endif
    @else
        <h4 class="text-danger mt-4">{{__('lang.admin.no_doctors')}}</h4>
    @endif
    </div>
</div>