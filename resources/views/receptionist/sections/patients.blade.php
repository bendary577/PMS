<div class="container">
    <div class="d-flex justify-content-center align-items-center">
       <div class="col-md-4">
            <a class="btn btn-success" href="{{route('receptionist.add.patient')}}">
               <li class="fa fa-plus" style="font-size:18px"></li>
               <h6>{{ __('lang.rec.add_patient')}}</h6>
            </a>
       </div>
    </div>
    <hr class="mt-5">
    <div class="row mt-2">
        <div class="col-12">
            <h2>{{ __('lang.rec.search_patient')}}</h2>
        </div>
        <!----------- search --------------->
        <div class="col-12">
            <!--- if patient is added is added successfully ----------->
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <!--- if patient is added is added successfully ----------->
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!--- if patient is not added successfully ----------->
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{route('receptionist.patients.search')}}">
            {{ csrf_field() }}
                <div class="input-group rounded">
                    <input type="text" class="form-control rounded" placeholder="{{ __('lang.rec.search_code')}}" aria-label="Search"
                        aria-describedby="search-addon" required name="code"/>
                    <input class="input-group-text border-0" id="search-addon" type="submit" value="{{ __('lang.rec.search')}}" />
                </div>
            </form>
        </div>
    </div>
</div>