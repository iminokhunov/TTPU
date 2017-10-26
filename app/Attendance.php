<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $incrementing = false;
    protected  $primaryKey = 'id';

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    public function timeslot(){
        return $this->belongsTo('App\Timeslot');
    }

}
