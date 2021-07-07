<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnoseDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'treatment_protocol'
    ];


    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }

    public function diagnose()
    {
        return $this->belongsTo(Diagnose::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_diagnoses_description');
    }
}
