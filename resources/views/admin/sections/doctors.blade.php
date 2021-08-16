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
                        <th scope="col">{{__('lang.admin.table.name')}}</th>
                        <th scope="col">{{__('lang.admin.table.mobile')}}</th>
                        <th scope="col">{{__('lang.admin.table.specialization')}}</th>
                        <th scope="col">{{__('lang.admin.table.action')}}</th>
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
                                <!-- <a href="" class="btn btn-info">{{__('lang.admin.check_scheduale')}}</a> -->
                                <a href="{{route('admin.delete.doctor', ['id' => $doctor->user->id ])}}" class="btn btn-danger">{{__('lang.admin.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4">{{__('lang.admin.no_doctors')}}</h3>
        @endif
    </div>
</div>