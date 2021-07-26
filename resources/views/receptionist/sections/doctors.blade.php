<div class="container">
    <div class="row">
    @if(count($doctors) != 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{__('lang.doctor.table.name')}}</th>
                    <th scope="col">{{__('lang.admin.table.mobile')}}</th>
                    <th scope="col">{{__('lang.admin.table.specialization')}}</th>
                    <th scope="col">{{__('lang.doctor.table.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <th scope="row">{{ $doctor->user->name }}</th>
                    @if(isset($doctor->phone))
                    <td>{{ $doctor->phone }}</td>
                    @else
                    <td>--</td>
                    @endif
                    @if(isset($doctor->medicalSpeciality))
                    <td>{{ $doctor->medicalSpeciality->name }}</td>
                    @else
                    <td>{{__('lang.doctor.no_medical_speciality')}}</td>
                    @endif 
                    <td><a href="" class="btn btn-success">{{__('lang.admin.check_scheduale')}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-danger mt-4">{{__('lang.admin.no_doctors')}}</h3>
    @endif
    </div>
</div>