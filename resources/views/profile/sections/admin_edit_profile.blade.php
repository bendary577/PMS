<div class="container">
    <div class=""><h2>Edit Profile</h2></div>

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

    <form method="POST" action="{{route('admin.update.profile')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="name">Phone</label>
            <input type="tel" name="phone" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="birth_date">About Description</label>
            <div class="form-group"> 
                <textarea class="form-control" name="about" rows="7" id="messageNine" placeholder="Write about description"></textarea> 
            </div> 
        </div>
        <div class="my-2 form-group">
            <label for="inputState">profile image</label>
            <input type="file" name="image" accept="image/*"  >
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>