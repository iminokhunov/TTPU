<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function groups(){
        $this->hasMany('App\Group');
    }
}
