<div class="container">
    <div class="">
        <div>
        <!--- if any errors when activating or blocking a profile ----------->
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        <!--- if profile is activated or blocked successfully ----------->
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        </div>

        <!--- display registration requests ----------->
        @if(count($users) != 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Account</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            @if($user->getHasReceptionistProfileAttribute())
                            <td>Receptionist</td>
                            @elseif($user->getHasDoctorProfileAttribute())
                            <td>Doctor</td>
                            @else
                            <td>Admin</td>
                            @endif
                            <th scope="row">{{ $user->name }}</th>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{route('admin.activate.registration.requests', ['id' => $user->id ])}}" class="btn btn-success">activate account</a>
                                <a href="{{route('admin.delete.registration.requests', ['id' => $user->id ])}}" class="btn btn-danger">delete request</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">Sorry, no registration requests to the system right now!</h3>
        @endif
    </div>
</div>