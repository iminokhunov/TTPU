<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public $incrementing = false;
    protected  $primaryKey = 'id';

    public function timeslots()
    {
        return $this->hasMany('App/Timeslot');
    }
}
