<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    public $incrementing = false;

    public function attendances()
    {
        $this->hasMany('App\Attendance');
    }
    public function group()
    {
        return $this->belongsTo('App/Group');
    }
    public function room()
    {
        return $this->belongsTo('App/Room');
    }
    public function teacher()
    {
        return $this->belongsTo('App/Teacher');
    }
    public function course()
    {
        return $this->belongsTo('App/Course');
    }
    public function slot()
    {
        return $this->belongsTo('App/Slot');
    }
}
