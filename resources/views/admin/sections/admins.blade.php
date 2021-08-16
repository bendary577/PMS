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
        @if (count($admins) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">{{ __('lang.admin.table.name')}}</th>
                        <th scope="col">{{ __('lang.admin.table.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)

                    <div class="modal fade" id="handle_authorities_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.admin.handle_authorities_modal_title')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ __('lang.admin.handle_authorities_modal_message')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.admin.cancel')}}</button>
                                <a href="{{route('admin.handle.super.admin', ['id' => $admin->profile->id])}}" class="btn btn-primary">{{ __('lang.admin.confirm')}}</a>
                            </div>
                            </div>
                        </div>
                    </div>

                        <tr>
                            <th scope="row">{{ $admin->name }}</th>
                            <td>
                                @if($admin->profile->has_handle_authority_request == 1)
                                <a class="btn btn-primary">{{ __('lang.admin.request_sent')}}</a>
                                <a href="{{route('admin.cancel.handle.super.admin', ['id' => $admin->profile->id])}}" class="btn btn-info">{{ __('lang.admin.cancel')}}</a>
                                @else
                                <a href="{{route('admin.handle.super.admin', [ 'id' => $admin->profile->id ])}}" class="btn btn-danger" data-toggle="modal" data-target="#handle_authorities_modal">{{ __('lang.admin.handle_super_admin')}}</a>
                                @endif
                                @if($admin->blocked == 0)
                                <a href="{{route('admin.block.account', [ 'id' => $admin->id ])}}" class="btn btn-warning">{{ __('lang.admin.block_account')}}</a>
                                @else
                                <a href="{{route('admin.unblock.account', [ 'id' => $admin->id ])}}" class="btn btn-success">{{ __('lang.admin.unblock_account')}}</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">{{__('lang.admin.no_admins')}}</h3>
        @endif
    </div>
</div>
