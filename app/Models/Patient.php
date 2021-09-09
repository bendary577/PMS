<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'age',
        'code',
        'gender',
        'birthdate',
        'attendance_date',
        'card_image_path',
        'sheet_image_path',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }


    public function generateCode()
    {
        return rand(pow(10, 8-1), pow(10, 8)-1);
    }

    public function medicalSpecialities()
    {
        return $this->belongsToMany(MedicalSpeciality::class, 'patients_medical_specialities')->using(PatientMedicalSpeciality::class);
        /* ->withPivot('description', 'treatment_protocol'); */ 
    }

}
