
<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="{{url('/images/dashboard/adults.png')}}" class="card-img-top" alt="welcome" />
                <div class="card-body">
                <h5 class="card-title">{{__('lang.rec.adults_clinics')}}</h5>
                    <p class="card-text">{{__('lang.rec.adults_clinics_description')}}</p>
                    <a href="{{route('adults.clinic.patient.appointment', ['id' => $id])}}" class="btn btn-primary">{{__('lang.rec.check_clinics')}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
            <img src="{{url('/images/dashboard/children.png')}}" class="card-img-top" alt="welcome" />
                <div class="card-body">
                <h5 class="card-title">{{__('lang.rec.children_clinics')}}</h5>
                    <p class="card-text">{{__('lang.rec.children_clinics_description')}}</p>
                    <a href="{{route('children.clinic.patient.appointment', ['id' => $id])}}" class="btn btn-primary">{{__('lang.rec.check_clinics')}}</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>