<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\ReceptionistProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function editReceptionist($id)
    {
        $receptionist = ReceptionistProfile::find($id);
        return view('admin.dashboard.dashboard_update_receptionist', [ 'receptionist_id' => $receptionist->id, 'receptionist_name' =>$receptionist->user->name]);
    }

    public function updateReceptionist(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'shift_start' => 'nullable',
            'shift_end' => 'nullable',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $receptionist = ReceptionistProfile::find($id);

        if($request['shift_start']){
            $receptionist->shift_start = $request['shift_start'];
        }

        if($request['shift_end']){
            $receptionist->shift_end = $request['shift_end'];
        }

        if($request['about']){
            $receptionist->about = $request['about'];
        }

        $receptionist->save();

        session()->flash('success', 'receptionist profile was updated succesfuly');
        return redirect()->back();  
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('profile.dashboard.dashboard_admin_edit_profile');
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'nullable|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'nullable|string',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }

        $id = Auth::user()->id;
        $admin = User::find($id);

        if($request['name']){
            $admin->name = $request['name'];
        }

        if($request['about']){
            $admin->profile->about = $request['about'];
        }

        if($request['image']){
            $imageName = $request->image->getClientOriginalName();
            $path = '/avatars/'.'/'.$admin->id.'/';
            $request->image->move(public_path().$path, $imageName);
            $admin->profile->avatar_path = $path.$imageName;
        }

        $admin->save();
        $admin->profile->save();

        session()->flash('success', 'your profile was updated succesfuly');
        return redirect()->back(); 
    }


    public function destroy($id)
    {
        //
    }

    public function welcome()
    {
        return view('admin.dashboard.dashboard_welcome');
    }

    public function getRegistrationRequests(){
        $users = User::where('activated', false)->where('id', '!=', Auth::user()->id)->get();
        return view('admin.dashboard.dashboard_registration_requests', ['users'=> $users]);
    }

    public function activate($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->activated = true;
            $user->save();
            session()->flash('success', 'user account activated successfully');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'user doesn\'t exist');
            return redirect()->back(); 
        }
    }

    public function block($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->blocked = true;
            $user->save();
            session()->flash('success', 'user account blocked successfully');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'user doesn\'t exist');
            return redirect()->back(); 
        }
    }

    public function unblock($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->blocked = false;
            $user->save();
            session()->flash('success', 'user account unblocked successfully');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'user doesn\'t exist');
            return redirect()->back(); 
        }
    }

    public function delete($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $profile = $user->profile();
            $profile->delete();
            $user->delete();
            session()->flash('success', 'user account deleted successfully');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'user doesn\'t exist');
            return redirect()->back(); 
        }
    }

}
