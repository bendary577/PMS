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

    @if($medicalSpeciality)
    <div class=""><h2>{{__('lang.admin.update_medical_speciality')}}</h2></div>
    <form method="POST" action="{{route('admin.update.medical.speciality', ['id' => $medicalSpeciality->id ])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">{{__('lang.admin.table.name')}}</label>
            <input type="name" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="{{__('lang.admin.table.name')}}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{__('lang.submit')}}</button>
    </form>
    @else
    <h4 class="text-danger">{{__('lang.admin.no_medical_speciality')}}</h4>
    @endif
</div>