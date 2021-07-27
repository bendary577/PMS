<div class="container">
    <div class=""><h2>{{__('lang.dashboard.edit_profile')}}</h2></div>

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
            <label for="name">{{__('lang.name')}}</label>
            <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{__('lang.name')}}">
        </div>
        <div class="form-group">
            <label for="name">{{__('lang.phone')}}</label>
            <input type="tel" name="phone" class="form-control" id="name" aria-describedby="emailHelp" placeholder="{{__('lang.phone')}}">
        </div>
        <div class="form-group">
            <label for="birth_date">{{__('lang.about')}}</label>
            <div class="form-group"> 
                <textarea class="form-control" name="about" rows="7" id="messageNine" placeholder="{{__('lang.about')}}"></textarea> 
            </div> 
        </div>
        <div class="my-2 form-group">
            <label for="inputState">{{__('lang.avatar')}}</label>
            <input type="file" name="image" accept="image/*"  >
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{__('lang.update')}}</button>
    </form>
</div>