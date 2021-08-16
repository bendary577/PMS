<div class="container">

    <!--- if patient is added is added successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if patient is not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if($clinicId && $id)
    <div class=""><h2>{{ __('lang.rec.add_appointment')}}</h2></div>
    <form method="POST" action="{{route('receptionist.patient.store.appointment', ['clinicId'=>$clinicId, 'id'=>$id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="date">{{ __('lang.rec.table.birth_date')}}</label>
            <input type="date" name="date" class="form-control" id="birth_date" placeholder="{{ __('lang.rec.table.birth_date')}}">
        </div>
        <div class="form-group">
            <label for="from">{{ __('lang.doctor.table.from')}}</label>
            <input type="time" name="from" required>
        </div>
        <div class="form-group">
            <label for="to">{{ __('lang.doctor.table.to')}}</label>
            <input type="time" name="to" required>
        </div>
        <div class="form-group">
            <label for="inputState">{{ __('lang.doctor.table.appointment_reason')}}</label>
            <select id="inputState" name="reason" class="form-control">
                <option selected>{{ __('lang.doctor.select')}}</option>
                <option value="new visit">{{ __('lang.rec.new_visit')}}</option>
                <option value="consultant">{{ __('lang.rec.consultant')}}</option>
                <option value="follow up">{{ __('lang.rec.follow_up')}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
    @else
    <h4 class="text-danger">{{ __('lang.rec.no_appointment')}}</h4>
    @endif
</div>