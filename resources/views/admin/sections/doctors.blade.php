<div class="container">
    <div class="">

        <div>
        <!--- if any errors when deleting a doctor profile ----------->
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <!--- if doctor profile is deleted successfully ----------->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        </div>

        <!--- display doctor profiles ----------->
        @if (count($doctors) != 0)
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
                            @if(isset($doctor->medicalSpeciality))
                            <td>{{$doctor->phone}}</td>
                            @else
                            <td>--</td>
                            @endif
                            @if(isset($doctor->medicalSpeciality))
                            <td>{{$doctor->medicalSpeciality->name}}</td>
                            @else
                            <td>--</td>
                            @endif
                            <td>
                                <a href="" class="btn btn-info">check schedule</a>
                                <a href="{{route('admin.delete.doctor', ['id' => $doctor->user->id ])}}" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">Sorry, no doctors are registered in the system right now!</h3>
        @endif
    </div>
</div>