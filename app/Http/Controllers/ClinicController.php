<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\User;
use App\Models\DoctorProfile;
use App\Models\MedicalSpeciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{


    public function index()
    {
        $clinics = Clinic::paginate(10);
    }


    public function create()
    {
        return view('doctor.dashboard.dashboard_add_clinic');  
    }


    public function store(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->getHasDoctorProfileAttribute()){
            $validator = Validator::make($request->all(),
            [
                //'name' => 'required|string|max:200',
            ]);
            
            if ($validator->fails()){
                return  redirect()->back()->withErrors('error', $validator->errors()->all());   
            }
            
            $clinic = new Clinic();
            $clinic->examination_price = $request['examination_price'];
            $clinic->follow_up_price = $request['follow_up_price'];
            $clinic->available_from = $request['available_from'];
            $clinic->available_to = $request['available_to'];
            $clinic->department = $request['department'];
            
            
            $clinic->save();

            $doctor = DoctorProfile::find(Auth::user()->profile->id);
            $doctor->clinic()->save($clinic);
            $clinic->doctorProfile()->associate($doctor)->save();

            session()->flash('success', 'clinic added succesfuly');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'sorry, only doctors can create clinics');
            return redirect()->back(); 
        }
    }


    public function show()
    {
        if(isset(Auth::user()->profile->clinic)) {
            $clinic = Clinic::find(Auth::user()->profile->clinic->id);
            return view('doctor.dashboard.dashboard_clinic', ['clinic' => $clinic]);
        }else{
            session()->flash('error', 'clinic doesn\'t exist');
            return redirect()->back(); 
        }
    }


    public function edit()
    {
        $clinic = Clinic::with('doctorProfile')->find(Auth::user()->profile->clinic->id);
        return view('doctor.dashboard.dashboard_edit_clinic_hours'); 
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'department' => 'string|max:255',
            'examination_price' => '',
            'follow_up_price' => '',
            'available_to' => '',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $clinic = Clinic::find(Auth::user()->profile->clinic->id);

        if($request['department']){
            $clinic->department = $request['department'];
        }

        if($request['examination_price']){
            $clinic->examination_price = $request['examination_price'];
        }

        if($request['follow_up_price']){
            $clinic->follow_up_price = $request['follow_up_price'];
        }

        if($request['available_to']){
            $clinic->available_to = $request['available_to'];
        }

        $clinic->save();

        session()->flash('success', 'clinic info was updated succesfuly');
        return redirect()->back();   
    }


    public function destroy()
    {
        $id = Auth::user()->profile->clinic->id;
        $clinic = Clinic::where('id', $id )->first();
        $clinic->delete();
        return redirect()->route('doctor.dashboard');
    }

    public function getClinicsView()
    {
        return view('receptionist.dashboard.dashboard_clinics');
    }

    public function getAdultsClinics()
    {
        $clinics = Clinic::where('department', 'adults')->with('doctorProfile')->get();
        return view('receptionist.dashboard.dashboard_udults_clinics', ['clinics' => $clinics]);
    }

    public function getChildrenClinics()
    {
        $clinics = Clinic::where('department', 'children')->with('doctorProfile')->get();
        return view('receptionist.dashboard.dashboard_children_clinics', ['clinics' => $clinics]);
    }


}
