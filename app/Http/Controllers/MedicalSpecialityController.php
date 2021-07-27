<?php

namespace App\Http\Controllers;

use App\Models\MedicalSpeciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalSpecialityController extends Controller
{

    public function index()
    {
        $medicalSpecialities = MedicalSpeciality::paginate(10);
        return view('admin.dashboard.dashboard_medical_specialities', ['medicalSpecialities' => $medicalSpecialities]);
    }


    public function create()
    {
        return view('admin.dashboard.dashboard_add_medical_speciality');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $medicalSpeciality = new MedicalSpeciality();
        $medicalSpeciality->name = $request['name'];

        $medicalSpeciality->save();

        session()->flash('success', trans('lang.medical_spec.added'));
        return redirect()->back();   
    }


    public function show(MedicalSpeciality $medicalSpeciality)
    {
        //
    }


    public function edit($id)
    {
        $medicalSpeciality = medicalSpeciality::find($id);
        return view('admin.dashboard.dashboard_update_medical_speciality', ['medicalSpeciality' => $medicalSpeciality]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:200',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $medicalSpeciality = medicalSpeciality::find($id);

        if($request['name']){
            $medicalSpeciality->name = $request['name'];
        }

        $medicalSpeciality->save();

        session()->flash('success', trans('lang.medical_spec.updated'));
        return redirect()->back(); 
    }


    public function destroy($id)
    {
        if(MedicalSpeciality::where('id', $id)->exists()) {
            $medicalSpeciality = MedicalSpeciality::find($id);
            $medicalSpeciality->delete();
            session()->flash('success', trans('lang.medical_spec.deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.medical_spec.error_deleting'));
            return redirect()->back(); 
        }
    }
}
