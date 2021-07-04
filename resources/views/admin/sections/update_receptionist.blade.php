<div class="container">
    <!--- if receptionist profile is deleted successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if receptionist profile is not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class=""><h2>Update Receptionist Profile Working Shifts</h2></div>
    @if($id)
    <form method="POST" action="{{route('admin.update.receptionist', ['id' => $id ])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="shift_start">Shift Starts at : </label>
            <input type="time" name="shift_start" required step="3600">
        </div>
        <div class="form-group">
            <label for="shift_end">Shifts Ends at : </label>
            <input type="time" name="shift_end" required step="3600">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    @else
        <h4 class="text-danger">Receptionist profile doesn't exist</h4>
    @endif
</div>