<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    public function apps(){
        return $this->belongsToMany('App\DynamicCms\Applications');
    }
    public function services(){
        return $this->belongsToMany('App\Services');
    } 
}
