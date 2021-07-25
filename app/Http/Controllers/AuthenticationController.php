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

class AuthenticationController extends Controller
{
    public function register()
    {
      return view('auth.register');
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
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

            if($user->activated == false && !$user->getHasAdminProfileAttribute()){
                session()->flash('error', 'sorry, your account is not activated yet');
                return redirect()->back();
            }

            if($user->blocked == true){
                session()->flash('error', 'sorry, your account is blocked');
                return redirect()->back();
            }

            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                var_dump($user->name);
                return redirect()->intended('/profile');
            }else{
                return redirect('login')->with('error', 'Oppes! You have entered invalid password');
            }

        }else{
            return redirect('login')->with('error', 'Oppes! It seems you didn\'t register in our system');
        }
    }

    public function logout() {
      Auth::logout();
      return redirect('login');
    }

}
