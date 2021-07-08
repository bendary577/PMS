<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    use HasFactory;

    protected $table = 'diagnoses';
    
    protected $fillable = [
        'name'
    ];

    public function medicalSpeciality()
    {
        return $this->belongsTo(MedicalSpeciality::class);
    }

    public function diagnosesDescription()
    {
        return $this->hasOne(DiagnoseDescription::class);
    }

}
