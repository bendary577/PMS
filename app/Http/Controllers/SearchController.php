<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;

class SearchController extends Controller
{

    public function search(Request $request){
        $validator = Validator::make($request->all(),
        [
            'code' => 'required|integer',
        ]);

        if ($validator->fails()){
            return  redirect()->back()->withErrors('error', $validator->errors()->all());   
        }
        if(Patient::where('code', $request['code'])->exists()){
            $patient = Patient::where('code', $request['code'])->first();
            return view('receptionist.dashboard.dashboard_search', ['patient' => $patient]);
        }else{
            session()->flash('error', 'patient profile doesn\'t exist');
            return redirect()->back(); 
        }

    }
    
}
