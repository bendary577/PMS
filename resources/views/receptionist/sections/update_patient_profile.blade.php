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

    @if($patient)
    <div class=""><h2>Update Patient Profile</h2></div>
    <form method="POST" action="{{route('receptionist.update.patient', ['id' => $patient->id ])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{ $patient->name }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="{{ $patient->phone }}">
        </div>
        <div class="form-group">
            <label for="phone">Age</label>
            <input type="number" name="age" class="form-control" id="number" aria-describedby="emailHelp" placeholder="{{ $patient->age }}">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birthdate" class="form-control" id="birth_date" placeholder="{{ $patient->birthdate }}">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
            <label class="form-check-label" for="exampleRadios1">
                Male
            </label>
        </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
            <label class="form-check-label" for="exampleRadios2">
                Female
            </label>
        </div>
        <div class="my-2">
            <input type="file" name="image" accept="image/*"  >
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
    @else
    <h4 class="text-danger">patient profile doesn't exist</h4>
    @endif
</div>