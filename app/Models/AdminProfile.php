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
      'security_code',
      'about'
  ];

    public function user() 
    { 
      return $this->morphOne('App\Models\User', 'profile');
    }

    public function generateCode(){
      return rand(pow(10, 8-1), pow(10, 8)-1);
  }
    
}
