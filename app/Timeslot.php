<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    public function attendances()
    {
        $this->hasMany('App\Attendance');
    }
}
