<?php

namespace App\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Pivot
{
    use SoftDeletes;
    protected $table = "appointments";
}