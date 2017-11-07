<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $incrementing = false;
    protected  $primaryKey = 'id';

    public function group(){
        $this->hasOne('App\Group');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function timeslots()
    {
        return $this->hasMany('App/Timeslot');
    }
}
