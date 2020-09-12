<?php

namespace App\DynamicCms;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    public function versions(){
        return $this->belongsToMany('App\Version');
    }
}
