<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function medicines()
    {
        return $this->belongsToMany(DiagnoseDescription::class, 'medicine_diagnoses_description');
    }
}
