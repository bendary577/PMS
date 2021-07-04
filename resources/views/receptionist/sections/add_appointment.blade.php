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
    <div class=""><h2>Add New Appointment</h2></div>
    <form method="POST" action="{{route('receptionist.patient.store.appointment', ['clinicId'=>$clinicId, 'id'=>$id])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="date">Birth Date</label>
            <input type="date" name="date" class="form-control" id="birth_date" placeholder="Birth date">
        </div>
        <div class="form-group">
            <label for="from">From : </label>
            <input type="time" name="from" required step="3600">
        </div>
        <div class="form-group">
            <label for="to">To : </label>
            <input type="time" name="to" required step="3600">
        </div>
        <div class="form-group">
            <label for="inputState">Appointment Reason</label>
            <select id="inputState" name="reason" class="form-control">
                <option selected>Select</option>
                <option value="new visit">new visit</option>
                <option value="consultant">consultant</option>
                <option value="follow up">follow up</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    @else
    <h4 class="text-danger">sorry, something went wrong while making new appointment</h4>
    @endif
</div>