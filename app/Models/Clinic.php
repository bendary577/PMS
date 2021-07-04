<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'examination_price',
        'follow_up_price',
        'available_from',
        'available_to',
        'department'
    ];


    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
