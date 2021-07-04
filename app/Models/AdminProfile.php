<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    protected $fillable = [
      'avatar_path',
      'about'
  ];

    public function user() 
    { 
      return $this->morphOne('App\Models\User', 'profile');
    }
    
}
