<div class="container">
    <!--- if medical speciality is added successfully ----------->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <!--- if medical speciality is not added successfully ----------->
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class=""><h2>{{__('lang.admin.add_medical_speciality')}}</h2></div>
    <form method="POST" action="{{route('admin.store.medical.speciality')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">{{__('lang.admin.table.name')}}</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{__('lang.admin.table.name')}}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{__('lang.submit')}}</button>
    </form>
</div>