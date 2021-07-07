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


    @if($receptionist_id && $receptionist_name)
    <div class=""><h2>Update {{ $receptionist_name }} Profile Working Shifts</h2></div>
    <form method="POST" action="{{route('admin.update.receptionist', ['id' => $receptionist_id ])}}">
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