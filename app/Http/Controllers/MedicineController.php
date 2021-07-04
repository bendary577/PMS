<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
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

        $medicine = new Medicine();
        $medicine->name = $request['name'];

        $medicine->save();

        session()->flash('success', 'medicine added succesfuly');
        return redirect()->back();  
    }


    public function show(Medicine $medicine)
    {
        //
    }


    public function edit($id, $medicineId)
    {
        return view('doctor.dashboard.dashboard_edit_medicines');
    }


    public function update(Request $request, Medicine $medicine)
    {
        //
    }


    public function destroy($id)
    {
        if(Medicine::where('id', $id)->exists()) {
            $medicine = Medicine::find($id);
            $medicine->delete();
            session()->flash('success', 'medicine is deleted succesfuly');
            return redirect()->back(); 
        }else{
            session()->flash('error', 'patient profile receptionist profile');
            return redirect()->back(); 
        }
    }
}
