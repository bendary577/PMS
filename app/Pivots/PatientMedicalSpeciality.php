<?php

namespace App\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientMedicalSpeciality extends Pivot
{
    use SoftDeletes;
    protected $table = "patients_medical_specialities";
}