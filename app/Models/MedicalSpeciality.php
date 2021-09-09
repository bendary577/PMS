<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function doctors()
    {
        return $this->hasMany(DoctorProfile::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnose::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patients_medical_specialities')->using(PatientMedicalSpeciality::class);
        /* ->withPivot('description', 'treatment_protocol'); */
    }
}
