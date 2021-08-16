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

        <div class=""><h2>{{__('lang.doctor.add_clinic')}}</h2></div>
        <form method="POST" action="{{route('doctor.store.clinic')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputState">{{__('lang.doctor.department')}}</label>
                <select id="inputState" class="form-control" name="department">
                    <option selected>{{__('lang.doctor.select')}}</option>
                    <option value="adults">{{__('lang.doctor.adults')}}</option>
                    <option value="children">{{__('lang.doctor.children')}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="examination_price">{{__('lang.doctor.examination_price')}}</label>
                <input type="number" name="examination_price" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="{{__('lang.doctor.examination_price')}}">
            </div>
            <div class="form-group">
                <label for="follow_up_price">{{__('lang.doctor.follow_up_price')}}</label>
                <input type="number" name="follow_up_price" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="{{__('lang.doctor.follow_up_price')}}">
            </div>
            <div class="form-group">
                <label for="shift_start">{{__('lang.doctor.available_from')}}</label>
                <input type="time" name="available_from" required>
            </div>
            <div class="form-group">
                <label for="shift_end">{{__('lang.doctor.available_to')}}</label>
                <input type="time" name="available_to" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">{{__('lang.submit')}}</button>
        </form>
</div>