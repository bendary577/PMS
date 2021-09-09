<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'phone',
    ];

    
    public function user() 
    { 
      return $this->morphOne('App\Models\User', 'profile');
    }
    
    public function clinic()
    {
        return $this->hasOne(Clinic::class);
    }

    public function medicalSpeciality()
    {
        return $this->belongsTo(MedicalSpeciality::class);
    }

}
