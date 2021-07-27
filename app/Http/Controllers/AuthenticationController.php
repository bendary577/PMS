<?php

namespace App\Http\Controllers;

use App\Models\ReceptionistProfile;
use App\Models\DoctorProfile;
use App\Models\AdminProfile;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    public function register()
    {
      $add_admin_warning = view('auth.add_admin_warning')->render();
      return view('auth.register', ['add_admin_warning' => $add_admin_warning]);
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        /*
        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        */

        if(strcmp( $request['password'], $request['confirmPassword'] ) != 0 ){
            session()->flash('error', 'passwords are not identical');
            return redirect()->back();   
        }

        $user = new User();
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->activated = false;
        $user->blocked = false;
        if($request['account'] == 'receptionist'){
            $receptionistProfile = new ReceptionistProfile();
            $receptionistProfile->save();
            $receptionistProfile->user()->save($user);
            if(Role::where('name', 'receptionist')->exists()){
                $role = Role::where('name', 'receptionist')->first();
                $user->attachRole($role);
            }else{
                $role = new Role();
                $role->name = 'receptionist';
                $role->display_name = 'Receptionist';
                $role->description  = 'system employee that manages patients';
                $role->save();  
                $user->attachRole($role);
            }
        }else if($request['account'] == 'doctor'){
            $doctorProfile = new DoctorProfile();
            $doctorProfile->save();
            $doctorProfile->user()->save($user);
            if(Role::where('name', 'doctor')->exists()){
                $role = Role::where('name', 'doctor')->first();
                $user->attachRole($role);
            }else{
                $role = new Role();
                $role->name = 'doctor';
                $role->display_name = 'Doctor';
                $role->description  = 'doctor who treats patients';
                $role->save();
                $user->attachRole($role);  
            }
        }else{
            $adminProfile = new AdminProfile();
            $adminProfile->save();
            $adminProfile->user()->save($user);
            if(Role::where('name', 'admin')->exists()){
                $role = Role::where('name', 'admin')->first();
                $user->attachRole($role);
            }else{
                $role = new Role();
                $role->name = 'admin';
                $role->display_name = 'Admin';
                $role->description  = 'Admin who manages employees';
                $role->save();
                $user->attachRole($role);  
            }
        }
        return redirect('/login');
    }
    
    public function login()
    {
      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        /*
        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        */

        if(User::where('username', $request['username'])->exists()) {

            $user = User::where('username', $request['username'])->first();

            if($user->activated == false && $user->getHasAdminProfileAttribute() && $user->profile->id !== 1){
                //return view('auth.admin_activate_account', ['email' => $user->email]);
                //return redirect()->route('request.admin.activation', ['email' => $user->email]);
                //var_dump(112);
                return redirect()->route('request.admin.activation', ['email' => $user->email]);
                //Redirect::route('request.admin.activation',['email' => $user->email]);
            }

            if($user->activated == false && !($user->getHasAdminProfileAttribute() && $user->profile->id === 1)){
                session()->flash('error', trans('lang.acc_not_activated'));
                return redirect()->back();
            }

            if($user->blocked == true){
                session()->flash('error', trans('lang.acc_is_blocked'));
                return redirect()->back();
            }

            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->intended('/profile');
            }else{
                return redirect('login')->with('error', trans('lang.login.invalid_credentials'));
            }

        }else{
            return redirect('login')->with('error', trans('lang.login.didnt_register'));
        }
    }

    public function activateAdminAccountView()
    {
      $email = request()->query('email');
      return view('auth.admin_activate_account', ['email'=> $email]);
    }

    public function activateAdminAccount(Request $request, $email)
    {
        if(User::where('email', '=', $email)->exists()){
            $user = User::where('email', $email)->first();
            $security_code = $user->profile->security_code;
            if(strcmp(strval($request['security_code']), strval($security_code) ) != 0){
                session()->flash('error', trans('lang.admin.code_is_not_correct'));
                return redirect()->back();
            }else{
                $user->activated = true;
                $user->save();
                return redirect()->intended('/login');
            }
        }else{
            session()->flash('error', trans('lang.no_user'));
            return redirect()->back(); 
        }
    }

    public function logout() {
      Auth::logout();
      return redirect('login');
    }

}
