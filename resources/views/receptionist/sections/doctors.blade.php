<div class="container">
    <div class="row">
    @if(count($doctors) != 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <th scope="row">{{ $doctor->user->name }}</th>
                    @if(isset($doctor->phone))
                    <td>{{ $doctor->phone }}</td>
                    @else
                    <td>--</td>
                    @endif
                    @if(isset($doctor->medicalSpeciality))
                    <td>{{ $doctor->medicalSpeciality->name }}</td>
                    @else
                    <td>no medical speciality chosen</td>
                    @endif 
                    <td><a href="" class="btn btn-success">check schedule</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-danger mt-4">Sorry, no doctors are registered in the system right now!</h3>
    @endif
    </div>
</div>