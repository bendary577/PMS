<div class="container">
    <div class="row">
        @if($clinics && count($clinics) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">department</th>
                    <th scope="col">doctor name</th>
                    <th scope="col">available from</th>
                    <th scope="col">available to</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clinics as $clinic)
                <tr>
                    <td>{{ $clinic->department }}</td>
                    <td>{{ $clinic->doctorProfile->user->name }}</td>
                    <td>{{ $clinic->available_from }}</td>
                    <td>{{ $clinic->available_to }}</td>
                    <td><button class="btn btn-info">new appointment</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-danger mt-4">Sorry, no clinics are registered in the system right now!</h3>
    @endif
    </div>
</div>