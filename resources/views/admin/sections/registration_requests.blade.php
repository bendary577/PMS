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
                        <th scope="col">{{ __('lang.admin.table.name')}}</th>
                        <th scope="col">{{ __('lang.admin.table.account')}}</th>
                        <th scope="col">{{ __('lang.admin.table.created_at')}}</th>
                        <th scope="col">{{ __('lang.admin.table.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            @if($user->getHasReceptionistProfileAttribute())
                            <td>{{ __('lang.acc.receptionist')}}</td>
                            @elseif($user->getHasDoctorProfileAttribute())
                            <td>{{ __('lang.acc.doctor')}}</td>
                            @else
                            <td>{{ __('lang.acc.admin')}}</td>
                            @endif
                            <th scope="row">{{ $user->name }}</th>
                            <td>{{ $user->created_at }}</td>
                            <td>
                            @if($user->getHasAdminProfileAttribute())
                                <a href="{{route('admin.generate.admin.code', ['id' => $user->id ])}}" class="btn btn-warning">{{ __('lang.admin.generate_code')}}</a>
                            @else
                                <a href="{{route('admin.activate.registration.requests', ['id' => $user->id ])}}" class="btn btn-success">{{ __('lang.admin.activate')}}</a>
                            @endif
                                <a href="{{route('admin.delete.registration.requests', ['id' => $user->id ])}}" class="btn btn-danger">{{ __('lang.admin.delete_request')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">{{ __('lang.admin.no_requests')}}</h3>
        @endif
    </div>
</div>