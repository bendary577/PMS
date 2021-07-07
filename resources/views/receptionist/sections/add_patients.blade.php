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

    <div class=""><h2>Add New Patient Profile</h2></div>
    <form method="POST" action="{{route('receptionist.store.patient')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="phone">Age</label>
            <input type="number" name="age" class="form-control" id="number" aria-describedby="emailHelp" placeholder="Enter Age">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birthdate" class="form-control" id="birth_date" placeholder="Birth date">
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
        <div class="my-2"><h4>Please Add Patient Card</h4></div>
        <div class="my-2">
            <input type="file" name="image" accept="image/*"  >
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>