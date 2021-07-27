<div class="container">
    <div class="">
        <div class="my-4">
            <a href="{{route('admin.add.medical.speciality')}}" class="btn btn-success">{{ __('lang.admin.add_medical_speciality')}}</a>
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
                        <th scope="col">{{__('lang.admin.table.name')}}</th>
                        <th scope="col">{{__('lang.admin.table.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalSpecialities as $medicalSpeciality)
                        <tr>
                            <th scope="row">{{$medicalSpeciality->name}}</th>
                            <td>
                                <a href="{{route('admin.edit.medical.speciality', ['id' => $medicalSpeciality->id ])}}" class="btn btn-info">{{__('lang.admin.edit')}}</a>
                                <a href="{{route('admin.delete.medical.speciality', ['id' => $medicalSpeciality->id ])}}" class="btn btn-danger">{{__('lang.admin.delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-danger mt-4 mx-2">{{__('lang.admin.no_medical_specialities')}}</h3>
        @endif
    </div>
</div>