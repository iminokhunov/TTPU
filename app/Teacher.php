<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function group(){
        $this->hasOne('App\Group');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
