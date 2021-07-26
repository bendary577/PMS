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
                        <th scope="col">{{ __('lang.admin.table.name')}}</th>
                        <th scope="col">{{ __('lang.admin.table.shift_start')}}</th>
                        <th scope="col">{{ __('lang.admin.table.shift_end')}}</th>
                        <th scope="col">{{ __('lang.admin.table.action')}}</th>
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
                                <a href="{{route('admin.edit.receptionist', [ 'id' => $receptionist->id ])}}" class="btn btn-info">{{ __('lang.admin.update_account')}}</a>
                                <a href="{{route('admin.delete.receptionist', [ 'id' => $receptionist->id ])}}" class="btn btn-danger">{{ __('lang.admin.delete_account')}}</a>
                                @if($receptionist->user->blocked == 0)
                                <a href="{{route('admin.block.account', [ 'id' => $receptionist->user->id ])}}" class="btn btn-warning">{{ __('lang.admin.block_account')}}</a>
                                @else
                                <a href="{{route('admin.unblock.account', [ 'id' => $receptionist->user->id ])}}" class="btn btn-success">{{ __('lang.admin.unblock_account')}}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">{{__('lang.admin.no_receptionists')}}</h3>
        @endif
    </div>
</div>