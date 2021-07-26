<div class="container">
    <div class="row">
        @if(count($clinics) != 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ __('lang.rec.table.department')}}</th>
                    <th scope="col">{{ __('lang.rec.table.doctor_name')}}</th>
                    <th scope="col">{{ __('lang.rec.table.available_from')}}</th>
                    <th scope="col">{{ __('lang.rec.table.available_to')}}</th>
                    <th scope="col">{{ __('lang.rec.table.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clinics as $clinic)
                <tr>
                    <th scope="row">{{ $clinic->department }}</th>
                    <td>{{ $clinic->doctorProfile->user->name }}</td>
                    <td>{{ $clinic->available_from }}</td>
                    <td>{{ $clinic->available_to }}</td>
                    <td><button class="btn btn-success">{{ __('lang.rec.new_appointment')}}</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-danger mt-4">{{ __('lang.rec.no_clinics')}}</h3>
    @endif
    </div>
</div>