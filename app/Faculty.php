<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public $incrementing = false;
    protected  $primaryKey = 'id';
    public function groups(){
        $this->hasMany('App\Group');
    }
}
