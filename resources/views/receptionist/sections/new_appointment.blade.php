
<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="{{url('/images/dashboard/adults.png')}}" class="card-img-top" alt="welcome" />
                <div class="card-body">
                    <h5 class="card-title">Adults Clinic</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="{{route('adults.clinic.patient.appointment', ['id' => $id])}}" class="btn btn-primary">check clinics</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
            <img src="{{url('/images/dashboard/children.png')}}" class="card-img-top" alt="welcome" />
                <div class="card-body">
                    <h5 class="card-title">Childs Clinic</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="{{route('children.clinic.patient.appointment', ['id' => $id])}}" class="btn btn-primary">check clinics</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>