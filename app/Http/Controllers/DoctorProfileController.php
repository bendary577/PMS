<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Models\Clinic;
use App\Models\MedicalSpeciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{

    public function index()
    {
        $doctors = DoctorProfile::with('medicalSpeciality')->paginate(10);
        return view('admin.dashboard.dashboard_doctors', ['doctors' => $doctors]);
    }

    public function show($id)
    {
        if(DoctorProfile::where('id', $id)->exists()) {
            $doctorProfile = DoctorProfile::find($id);
            return view('doctor.dashboard.dashboard_doctor_file', ['doctor' => $doctorProfile]);
        }else{
            session()->flash('error', trans('lang.doc.no_doc'));
            return redirect()->back(); 
        }
    }


    public function edit()
    {
        $medicalSpecialities = MedicalSpeciality::all();
        return view('profile.dashboard.dashboard_doctor_edit_profile', ['medicalSpecialities' => $medicalSpecialities]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable',
            'about' => 'nullable',
            'specialization' => 'nullable'
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $id = Auth::user()->id;
        $doctor = User::find($id);

        if($request['name']){
            $doctor->name = $request['name'];
        }

        if($request['image']){
            $imageName = $request->image->getClientOriginalName();
            $path = '/avatars/'.'/'.$doctor->id.'/';
            $request->image->move(public_path().$path, $imageName);
            $doctor->user->avatar_path = $path.$imageName;
        }

        if($request['phone']){
            $doctor->profile->phone = $request['phone'];
        }

        if($request['about']){
            $doctor->user->about = $request['about'];
        }

        if($request['specialization']){
            $medical_speciality = MedicalSpeciality::find(intval($request['specialization']));
            $doctor->profile->medicalSpeciality()->associate($medical_speciality)->save();
        }

        $doctor->save();
        $doctor->user->save();
        $doctor->profile->save();

        session()->flash('success', trans('lang.doc.profile_updated'));
        return redirect()->back();   
    }


    public function destroy($id)
    {
        if(DoctorProfile::where('id', $id)->exists()) {
            $doctorProfile = DoctorProfile::find($id);
            $doctorProfile->user->delete();
            $doctorProfile->delete();
            session()->flash('success', trans('lang.doc.profile_deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.doc.error_deleting_profile'));
            return redirect()->back(); 
        }
    }

    public function welcome()
    {
        return view('doctor.dashboard.dashboard_welcome');
    }


    public function indexReceptionist()
    {
        $doctors = DoctorProfile::with('medicalSpeciality')->paginate(10);
        return view('receptionist.dashboard.dashboard_doctors', ['doctors' => $doctors]);
    }

    public function schedules($id)
    {
        $doctor = DoctorProfile::where('id', $id)->with('medicalSpeciality')->first();
        $clinic = Clinic::where('doctor_profile_id', $doctor->id)->with('appointments')->first();
        var_dump($clinic->id);
        return view('receptionist.dashboard.dashboard_doctor_schedules', ['doctor' => $doctor, 'clinic' => $clinic]);
    }
}
