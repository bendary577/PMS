<div class="container">

    <!--- if clinic is deleted successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if clinic is not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

        <div class=""><h2>Edit Clinic</h2></div>
        <form method="POST" action="{{route('doctor.update.clinic_hours')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputState">Department</label>
                <select id="inputState" class="form-control" name="department">
                    <option selected>Select</option>
                    <option value="adults">Adults</option>
                    <option value="children">Children</option>
                </select>
            </div>
            <div class="form-group">
                <label for="examination_price">Examination Price</label>
                <input type="number" name="examination_price" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Examination Price">
            </div>
            <div class="form-group">
                <label for="follow_up_price">Follow Up Price</label>
                <input type="number" name="follow_up_price" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Examination Price">
            </div>
            <div class="form-group">
                <label for="shift_start">Available From : </label>
                <input type="time" name="available_from" required step="3600">
            </div>
            <div class="form-group">
                <label for="shift_end">Available To : </label>
                <input type="time" name="available_to" required step="3600">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
</div>