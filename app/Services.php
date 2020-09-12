<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function versions(){
        return $this->belongsToMany('App\Version');
    } 
}
