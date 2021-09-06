<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\ReceptionistProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\ActivateAdminMail;
use Illuminate\Support\Facades\Mail;

class AdminProfileController extends Controller
{

    public function index()
    {
        $admins = User::where('profile_id', '!=', Auth::user()->profile->id)->where('profile_type', '=', 'App\Models\AdminProfile')->where('activated', true)->get();
        return view('admin.dashboard.dashboard_admins', ['admins'=> $admins]);
    }


    public function create()
    {
        //
    }

    //admin account can fetch receptionists to a view and edit them
    public function editReceptionist($id)
    {
        $receptionist = ReceptionistProfile::find($id);
        return view('admin.dashboard.dashboard_update_receptionist', [ 'receptionist_id' => $receptionist->id, 'receptionist_name' =>$receptionist->user->name]);
    }

    //admin account can update info of a single receptionist
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

        session()->flash('success', trans('lang.rec.update_success'));
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

    //admin account can return a view to edit his own profile
    public function edit()
    {
        return view('profile.dashboard.dashboard_admin_edit_profile');
    }


    //admin account can update his profile info
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

        session()->flash('success', trans('lang.acc.update_success'));
        return redirect()->back(); 
    }


    public function destroy($id)
    {
        //
    }

    //admin account can review all users registration requests in the system
    public function getRegistrationRequests(){
        $users = [];
        if(Auth::user()->profile->is_super == true){
            $users = User::where('activated', false)->where('id', '!=', Auth::user()->id)->get();
        }else{
            $users = User::where('activated', false)->where('id', '!=', Auth::user()->id)->where('profile_type', '!=', 'App\Models\AdminProfile')->get();
        }
        return view('admin.dashboard.dashboard_registration_requests', ['users'=> $users]);
    }

    //admin account can activate other users accounts
    public function activate($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->activated = true;
            $user->save();
            session()->flash('success', trans('lang.user_activated'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }

    //admin account can generate activation code for other admins
    public function generateAdminCode($id){
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $security_code = $user->profile->generateCode();
            $user->profile->security_code =  $security_code;
            $user->profile->save();
            $data = ['content' => `Thanks for registration, your code is `.$security_code];
            //Mail::to($user->email)->send(new ActivateAdminMail($data, $user->email));
            session()->flash('success', trans('lang.admin.code_generated_success', ['code' => $security_code]));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }

    //admin account can block other users
    public function block($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->blocked = true;
            $user->save();
            session()->flash('success', trans('lang.user_blocked'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }

    //admin account can unblock other users
    public function unblock($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->blocked = false;
            $user->save();
            session()->flash('success', trans('lang.user_unblocked'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }

    //admin account can delete a certain user account
    public function delete($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $profile = $user->profile();
            $profile->delete();
            $user->delete();
            session()->flash('success', trans('lang.user_deleted'));
            return redirect()->back(); 
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }

    //super admin account can send request to handle super admin authorities to another admin in the system
    public function handleSuperAdmin($id)
    {
        $requests = AdminProfile::where('has_handle_authority_request', true)->count();
        if($requests < 1){
            $admin = AdminProfile::where('id', $id)->first();
            $admin->has_handle_authority_request = true;
            $admin->save();
            session()->flash('success', trans('lang.admin.handle_authorities_request_sent'));
            return redirect()->back();
        }else{
            session()->flash('error', trans('lang.admin.exceeded_authorities_request_limit'));
            return redirect()->back();
        }
    }

    //super admin account can cancel super admin handle authorities request
    public function cancelHandleSuperAdmin($id)
    {
        $admin = AdminProfile::where('id', $id)->first();
        $admin->has_handle_authority_request = false;
        $admin->save();
        session()->flash('success', trans('lang.admin.handle_authorities_request_cancelled'));
        return redirect()->back();
    }

    //admin account can accept the sent request to be a super admin
    public function confirmHandleAuthoritiesRequest()
    {
        $admin = Auth::user()->profile;
        $super_admin = AdminProfile::where('is_super', true)->first();
        $super_admin->is_super = false;
        $super_admin->save();
        $admin->has_handle_authority_request = false;
        $admin->is_super = true;
        $admin->save();
        session()->flash('success',  trans('lang.admin.authorities_request_confirmed'));
        return redirect()->back();
    }

    //admin account can refuse super admin handle authorities request
    public function cancelHandleAuthoritiesRequest()
    {
        $admin = Auth::user()->profile;
        $admin->has_handle_authority_request = false;
        $admin->save();
        session()->flash('success', trans('lang.admin.authorities_request_cancelled'));
        return redirect()->back();
    }

}
