<div class="container">
    <div class="row">
        <div class="my-4">
            <a href="{{route('admin.add.medical.speciality')}}" class="btn btn-success">Add New Medical Speciality</a>
        </div>

        <div>
        <!--- if any errors when deleting a receptionist profile ----------->
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <!--- if receptionist profile is deleted successfully ----------->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        </div>

        @if (count($medicalSpecialities) != 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalSpecialities as $medicalSpeciality)
                        <tr>
                            <th scope="row">{{$medicalSpeciality->name}}</th>
                            <td>
                                <a href="{{route('admin.edit.medical.speciality', ['id' => $medicalSpeciality->id ])}}" class="btn btn-info">edit</a>
                                <a href="{{route('admin.delete.medical.speciality', ['id' => $medicalSpeciality->id ])}}" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">Sorry, no medical specialities are registered in the system right now!</h3>
        @endif
    </div>
</div>