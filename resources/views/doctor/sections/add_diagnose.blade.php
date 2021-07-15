@if($medical_specialities && count($medical_specialities) > 0)

<div class="my-2">
    <h4 class="text-primary">add patient diagnose</h4>
    <form method="POST" action="{{route('doctor.add.diagnose')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Diagnose Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Diagnose Name">
        </div>
        <div class="form-group">
            <label for="inputState">Medical Speciality</label>
            <select id="inputState" name="specialization" class="form-control">
                <option selected>Select</option>
                @foreach($medical_specialities as $medical_speciality)
                <option value="{{$medical_speciality->id}}">{{ $medical_speciality->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@else
<div class="text-danger">sorry, no medical specialities are added yet</div>
@endif