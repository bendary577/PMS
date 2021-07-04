<div class="container">
    <div class="">

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

        <!--- display receptionist profiles ----------->
        @if (count($receptionists) != 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Shift start</th>
                        <th scope="col">Shift End</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receptionists as $receptionist)
                        <tr>
                            <th scope="row">{{ $receptionist->user->name }}</th>
                            @if(isset($receptionist->shift_start))
                            <td>{{ $receptionist->shift_start }}</td>
                            @else
                            <td>--</td>
                            @endif
                            @if(isset($receptionist->shift_end))
                            <td>{{ $receptionist->shift_end }}</td>
                            @else
                            <td>--</td>
                            @endif
                            <td>
                                <a href="{{route('admin.edit.receptionist', [ 'id' => $receptionist->id ])}}" class="btn btn-info">update account</a>
                                <a href="{{route('admin.delete.receptionist', [ 'id' => $receptionist->id ])}}" class="btn btn-danger">delete account</a>
                                @if($receptionist->user->blocked == 0)
                                <a href="{{route('admin.block.account', [ 'id' => $receptionist->user->id ])}}" class="btn btn-warning">block account</a>
                                @else
                                <a href="{{route('admin.unblock.account', [ 'id' => $receptionist->user->id ])}}" class="btn btn-success">unblock account</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">Sorry, no receptionists are registered in the system right now!</h3>
        @endif
    </div>
</div>