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
    <div class=""><h2>{{ __('lang.admin.update_receptionist', ['name' => $receptionist_name])}}</h2></div>
    <form method="POST" action="{{route('admin.update.receptionist', ['id' => $receptionist_id ])}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="shift_start">{{ __('lang.admin.shift_starts')}}</label>
            <input type="time" name="shift_start" required step="3600">
        </div>
        <div class="form-group">
            <label for="shift_end">{{ __('lang.admin.shift_ends')}}</label>
            <input type="time" name="shift_end" required step="3600">
        </div>
        <button type="submit" class="btn btn-primary mt-2">{{ __('lang.submit')}}</button>
    </form>
    @else
        <h4 class="text-danger">{{ __('lang.admin.no_receptionist')}}</h4>
    @endif
</div>