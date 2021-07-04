<div class="container">
    <!--- if doctor profile is deleted successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if doctor profile is not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class=""><h2>Add New Doctor Profile</h2></div>
    @if (count($medicalSpecialities) != 0)
        <form method="POST" action="{{route('admin.store.doctor')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label> <!--pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"-->
                <input type="tel" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter phone number" >
            </div>
            <div class="form-group">
            <label for="inputState">Medical Specialization</label>
            <select id="inputState" name="specialization" class="form-control">
                @foreach ($medicalSpecialities as $medicalSpeciality)
                    <option value="{{$medicalSpeciality->id}}">{{$medicalSpeciality->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                Specialization is not available ? <a href="{{route('admin.add.medical.speciality')}}" class="text-primary">add new Medical Specialization</a>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    @else
        <div class="form-group">
            Sorry, no medical Specializations are available yet ? <a href="{{route('admin.add.medical.speciality')}}" class="text-primary">add new Medical Specialization</a>
        </div>
    @endif
</div>