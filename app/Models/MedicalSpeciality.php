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
}