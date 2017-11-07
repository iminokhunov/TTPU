<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $incrementing = false;
    protected  $primaryKey = 'id';

    public function students()
    {
        return $this->hasMany('App\Student');
    }
    public function faculty(){
       return $this->belongsTo('App\Faculty');
    }
    public function teacher(){
       return $this->belongsTo('App\Teacher');
    }
    public function timeslots()
    {
        return $this->hasMany('App/Timeslot');
    }

}
