<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
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

    public function create()
    {
       /*
        $medicalSpecialities = MedicalSpeciality::all();
        return view('admin.dashboard.dashboard_add_doctor', ['medicalSpecialities' => $medicalSpecialities]);
        */
    }


    public function store(Request $request)
    {
       /* $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:255',
            'phone' => 'required|max:11',
            'specialization' => 'required'
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $user = new User();
        $user->name = $request['name'];
        $doctorProfile = new DoctorProfile();
        $doctorProfile->phone = $request['phone'];

        $doctorProfile->save();
        $doctorProfile->user()->save($user);

        $medical_speciality = MedicalSpeciality::where('id', $request['specialization'])->first();
        //$medical_speciality->doctors()->save($doctorProfile);
        $doctorProfile->medicalSpeciality()->associate($medical_speciality)->save();

        session()->flash('success', 'doctor profile added succesfuly');
        return redirect()->back();   
        */
    }


    public function show($id)
    {
        if(DoctorProfile::where('id', $id)->exists()) {
            $doctorProfile = DoctorProfile::find($id);
            return view('doctor.dashboard.dashboard_doctor_file', ['doctor' => $doctorProfile]);
        }else{
            session()->flash('error', 'doctor profile doesn\'t exist');
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
            $doctor->profile->avatar_path = $path.$imageName;
        }

        if($request['phone']){
            $doctor->profile->phone = $request['phone'];
        }

        if($request['about']){
            $doctor->profile->about = $request['about'];
        }

        if($request['specialization']){
            $medical_speciality = MedicalSpeciality::find(intval($request['specialization']));
            $doctor->profile->medicalSpeciality()->associate($medical_speciality)->save();
        }

        $doctor->save();
        $doctor->profile->save();

        session()->flash('success', 'receptionist profile was updated succesfuly');
        return redirect()->back();   
    }


    public function destroy($id)
    {
        if(DoctorProfile::where('id', $id)->exists()) {
            $doctorProfile = DoctorProfile::find($id);
            $doctorProfile->user->delete();
            $doctorProfile->delete();
            session()->flash('success', 'doctor profile deleted succesfuly');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'error in deleting doctor profile');
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
}
